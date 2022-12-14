<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\Place;
use App\Models\Post;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = File::all();
        return response()->json([
            'success' => true,
            'data' => $files,
        ], 200);
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
            // Patró PRG amb missatge d'èxit
            return response()->json([
                'success' => true,
                'data'    => $file
            ], 201);
        } else {
            \Log::debug("Local storage FAILS");
            // Patró PRG amb missatge d'error
            return response()->json([
                'success'  => false,
                'message' => 'Error uploading file'
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $file = File::find($id);
        if($file == null){
            return response()->json([
                'success' => false,
                'message'    => 'Error file not found'
            ], 404);
        }
        else{
            return response()->json([
                'success'  => true,
                'data' => $file
            ], 200);

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file = File::find($id);
        if ($file){
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
                \Storage::disk('public')->delete($file->filepath);
                \Log::debug("Local storage OK");
                $fullPath = \Storage::disk('public')->path($filePath);
                \Log::debug("File saved at {$fullPath}");
                // Desar dades a BD
                $file->filepath=$filePath;
                $file->filesize=$fileSize;
                $file->save();
                \Log::debug("DB storage OK");
                // Patró PRG amb missatge d'èxit
                return response()->json([
                    'success' => true,
                    'data'    => $file
                ], 200);
            } else {
                \Log::debug("Local storage FAILS");
                // Patró PRG amb missatge d'error 
                return response()->json([
                    'success'  => false,
                    'message' => 'Error uploading file'
                ], 500);
            }
        }else{
            return response()->json([
                'success'  => false,
                'message' => 'Error searching file'
            ], 404);
        }
    }
        


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = File::find($id);
        if($file){
            $place = Place::where('file_id', $file->id)->first();
            $post = Post::where('file_id', $file->id)->first();
            
            if (is_null($place) && is_null($post)){
                \Storage::disk('public')->delete($file -> filepath);
                $file->delete();
                if (\Storage::disk('public')->exists($file->filepath)) {
                    \Log::debug("Local storage OK");
                    // Patró PRG amb missatge d'error
                    
                    return response()->json([
                        'success'  => false,
                        'message' => 'Error uploading file'
                    ], 500);
                }
                else{
                    \Log::debug("File Delete");
                    // Patró PRG amb missatge d'èxit
                    return response()->json([
                        'success' => true,
                        'data'    => $file
                    ], 200);
                }
            }
            else{
                return response()->json([
                    'success'  => false,
                    'message' => 'Error deleting file, is linked to place or post'
                ], 500);
            }
        }
        else{
            return response()->json([
                'success'  => false,
                'message' => 'File not found'
            ], 404);

        }
    }
}
