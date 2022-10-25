@extends('layouts.app')
 
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{ __('Files') }}</div>
               <div class="card-body">
                   <table class="table">
                       <thead>
                           <tr>
                               <td scope="col">ID</td>
                               <td>{{ $file->id }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Filepath</td>
                                <td>{{ $file->filepath }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Filesize</td>
                                <td>{{ $file->filesize }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Created</td>
                                <td>{{ $file->created_at }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Updated</td>
                                <td>{{ $file->updated_at }}</td>
                           </tr>
                       </thead>
                   </table>
                   <table class="table">
                       <thead>
                           <tr>
                               <td scope="col">Image</td>
                               <td><img heigh="350px" width="350px" class="img-fluid" src="{{ asset("storage/{$file->filepath}") }}" /></td>
                           </tr>
                       </thead>
                   </table>
                   <form method="post" action="{{ route('files.destroy', $file) }}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="{{ route('files.index') }}" role="button">See file list</a>
                        <a class="btn btn-primary" href="{{ route('files.edit', $file) }}" role="button">Edit</a>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
