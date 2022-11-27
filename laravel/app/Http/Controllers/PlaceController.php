<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\File;
use App\Models\User;
use App\Models\Visibility;
use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;



class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("places.index", [
            "places" => Place::all(),
            "files" => File::all()
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("places.create", [
            "visibilities" => Visibility::all(),

        ]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // Validar fitxer
        $validatedData = $request->validate([
            'upload' => 'required|mimes:gif,jpeg,jpg,mp4,png|max:1024',
            'name' => 'required',
            'description' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'category_id' => 'required',
            'visibility_id' => 'required',
        ]);
    
        // Obtenir dades del fitxer
        $upload = $request->file('upload');
        $fileName = $upload->getClientOriginalName();
        $fileSize = $upload->getSize();
        $name = $request->get('name');
        $description = $request->get('description');
        $latitude = $request->get('latitude');
        $longitude = $request->get('longitude');
        $category_id = $request->get('category_id');
        $visibility_id = $request->get('visibility_id');
        \Log::debug("Storing file '{$fileName}' ($fileSize)...");

        // Pujar fitxer al disc dur
        $uploadName = time() . '_' . $fileName;
        $filePath = $upload->storeAs(
            'uploads',      // Path
            $uploadName ,   // Filename
            'public'        // Disk
        );
    
        if (\Storage::disk('public')->exists($filePath)) {
            \Log::debug("Local storage OK");
            $fullPath = \Storage::disk('public')->path($filePath);
            \Log::debug("File saved at {$fullPath}");

            // Desar dades a BD

            $file = File::create([
                'filepath' => $filePath,
                'filesize' => $fileSize,
            ]);

            $place = Place::create([
                'name' => $name,
                'description' => $description,
                'file_id' => $file->id,
                'latitude' => $latitude,
                'longitude' => $longitude,
                'category_id' => $category_id,
                'visibility_id' => $visibility_id,
                'author_id' =>auth()->user()->id,
            ]);

            \Log::debug("DB storage OK");
            // Patró PRG amb missatge d'èxit
            return redirect()->route('places.show', $place)
                ->with('success',__('fpp_traduct.place-success'));


        } else {
            \Log::debug("Local storage FAILS");
            // Patró PRG amb missatge d'error
            return redirect()->route("places.create")
                ->with('error',__('fpp_traduct.place-error'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function show(Place $place)
    {
        $file=File::find($place->file_id);
        $user=User::find($place->author_id);
        $visibility=Visibility::find($place->visibility_id);
        $contfavorites = Favorite::where('place_id', '=', $place->id)->count();

        $control = false;
        try {
            if (Favorite::where('user_id', '=', auth()->user()->id)->where('place_id','=', $place->id)->exists()) {
                $control = true;
            }
        } catch (Exception $e) {
            $control = false;
        }

        return view("places.show", [
            'place' => $place,
            'file' => $file,
            'user' => $user,
            'visibility' => $visibility,
            "control" => $control,
            "favorites" => $contfavorites,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function edit(Place $place)
    {
       
        if(auth()->user()->id == $place->author_id){
            $file=File::find($place->file_id);
            $user=User::find($place->author_id);
            $visibility=Visibility::find($place->visibility_id);
            return view("places.edit", [
                'place' => $place,
                'file' => $file,
                'user' => $user,
                'visibility' => $visibility,
                "visibilities" => Visibility::all(),

            ]);

        }
        else{
            return redirect()->route("places.show", $place)
                ->with('error',__('fpp_traduct.place-error-edit'));
        }
         
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Place $place)
    {
        
        // Validar fitxer
        $validatedData = $request->validate([
            'upload' => 'mimes:gif,jpeg,jpg,mp4,png|max:1024',
        ]);
    
        $file=File::find($place->file_id);

        // Obtenir dades del fitxer

        $upload = $request->file('upload');
        $controlNull = FALSE;
        if(! is_null($upload)){
            $fileName = $upload->getClientOriginalName();
            $fileSize = $upload->getSize();

            \Log::debug("Storing file '{$fileName}' ($fileSize)...");

            // Pujar fitxer al disc dur
            $uploadName = time() . '_' . $fileName;
            $filePath = $upload->storeAs(
                'uploads',      // Path
                $uploadName ,   // Filename
                'public'        // Disk
            );
        }
        else{
            $filePath = $file->filepath;
            $fileSize = $file->filesize;
            $controlNull = TRUE;
        }

        if (\Storage::disk('public')->exists($filePath)) {
            if ($controlNull == FALSE){
                \Storage::disk('public')->delete($file->filepath);
                \Log::debug("Local storage OK");
                $fullPath = \Storage::disk('public')->path($filePath);
                \Log::debug("File saved at {$fullPath}");

            }

            // Desar dades a BD

            $file->filepath=$filePath;
            $file->filesize=$fileSize;
            $file->save();
            \Log::debug("DB storage OK");
            $place->name=$request->input('name');
            $place->description=$request->input('description');
            $place->latitude=$request->input('latitude');
            $place->longitude=$request->input('longitude');
            $place->category_id=$request->input('category_id');
            $place->visibility_id=$request->input('visibility_id');
            $place->save();

            // Patró PRG amb missatge d'èxit
            return redirect()->route('places.show', $place)
                ->with('success',__('fpp_traduct.place-success'));


        } else {
            \Log::debug("Local storage FAILS");
            // Patró PRG amb missatge d'error
            return redirect()->route("places.edit")
                ->with('error',__('fpp_traduct.place-error'));
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Place  $place
     * @return \Illuminate\Http\Response
     */
    public function destroy(Place $place)
    {

        $file=File::find($place->file_id);

        \Storage::disk('public')->delete($place -> id);
        $place->delete();

        \Storage::disk('public')->delete($file -> filepath);
        $file->delete();
        if (\Storage::disk('public')->exists($place->id)) {
            \Log::debug("Local storage OK");
            // Patró PRG amb missatge d'error
            return redirect()->route('places.show', $place)
                ->with('error',__('fpp_traduct.place-error-delete'));
        }
        else{
            \Log::debug("Place Delete");
            // Patró PRG amb missatge d'èxit
            return redirect()->route("places.index")
                ->with('success',__('fpp_traduct.place-success-delete'));
        }  

    }


    public function favorite(Place $place)
    {
  
        
        $user=User::find(auth()->user()->id);
        $favorite = Favorite::create([
            'user_id' => $user->id,
            'place_id' => $place->id,
        ]);
        return redirect()->back();


    }


    public function unfavorite(Place $place)
    {
        Favorite::where('user_id',auth()->user()->id)
                 ->where('place_id', $place->id )->delete();
        return redirect()->back();

    }
}
