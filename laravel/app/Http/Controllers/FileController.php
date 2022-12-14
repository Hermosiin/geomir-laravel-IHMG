<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\Place;
use App\Models\Post;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function __construct()
    {
    $this->middleware('permission:files.list')->only('index');
    $this->middleware('permission:files.create')->only(['create','store']);
    $this->middleware('permission:files.read')->only('show');
    $this->middleware('permission:files.update')->only(['edit','update']);
    $this->middleware('permission:files.delete')->only('destroy');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("files.index", [
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
        return view("files.create");
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
           'upload' => 'required|mimes:gif,jpeg,jpg,png|max:1024'
       ]);
      
       // Obtenir dades del fitxer
       $upload = $request->file('upload');
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
      
       if (\Storage::disk('public')->exists($filePath)) {
           \Log::debug("Local storage OK");
           $fullPath = \Storage::disk('public')->path($filePath);
           \Log::debug("File saved at {$fullPath}");
           // Desar dades a BD
           $file = File::create([
               'filepath' => $filePath,
               'filesize' => $fileSize,
           ]);
           \Log::debug("DB storage OK");
           // Patr?? PRG amb missatge d'??xit
           return redirect()->route('files.show', $file)
               ->with('success', __('fpp_traduct.file-success'));
       } else {
           \Log::debug("Local storage FAILS");
           // Patr?? PRG amb missatge d'error
           return redirect()->route("files.create")
               ->with('error', __('fpp_traduct.file-error'));
       }
   }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function show(File $file)
    {
        return view("files.show", [
            'file' => $file
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function edit(File $file)
    {
        return view("files.edit", [
            'file' => $file
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, File $file)
    {
        // Validar fitxer
        $validatedData = $request->validate([
            'upload' => 'required|mimes:gif,jpeg,jpg,png|max:1024'
        ]);
    
        // Obtenir dades del fitxer
        $upload = $request->file('upload');
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
    
        if (\Storage::disk('public')->exists($filePath)) {
            \Log::debug("Local storage OK");
            $fullPath = \Storage::disk('public')->path($filePath);
            \Log::debug("File saved at {$fullPath}");
            // Desar dades a BD
            $file -> filePath = $filePath;
            $file -> fileSize = $fileSize;
            $file -> save();
            
            \Log::debug("DB storage OK");
            // Patr?? PRG amb missatge d'??xit
            return redirect()->route('files.show', $file)
                ->with('success', __('fpp_traduct.file-success'));
        } else {
            \Log::debug("Local storage FAILS");
            // Patr?? PRG amb missatge d'error
            return redirect()->route("files.create")
                ->with('error', __('fpp_traduct.file-error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\File  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy(File $file)
    {

        $place = Place::where('file_id', $file->id)->first();
        $post = Post::where('file_id', $file->id)->first();
        
        if (is_null($place) && is_null($post)){
            \Storage::disk('public')->delete($file -> filepath);
            $file->delete();
            if (\Storage::disk('public')->exists($file->filepath)) {
                \Log::debug("Local storage OK");
                // Patr?? PRG amb missatge d'error
                return redirect()->route('files.show', $file)
                    ->with('error', __('fpp_traduct.file-success-delete'));
            }
            else{
                \Log::debug("File Delete");
                // Patr?? PRG amb missatge d'??xit
                return redirect()->route("files.index")
                    ->with('success', __('fpp_traduct.file-error-delete'));
            }
        }
        else{
            return redirect()->route('files.show', $file)
            ->with('error', __('fpp_traduct.file-error-delete2'));
        }
    }
}
