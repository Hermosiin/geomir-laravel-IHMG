@extends('layouts.app')
 
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{ __('Places') }}</div>
               <div class="card-body">
                   <table class="table">
                       <thead>
                           <tr>
                               <td scope="col">Id</td>
                               <td>{{ $place->id }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Name</td>
                                <td>{{ $place->name }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Description</td>
                                <td>{{ $place->description }}</td>
                           </tr>
                           <tr>
                                <td scope="col">File Id</td>
                                <td>{{ $place->file_id }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Latitude</td>
                                <td>{{ $place->latitude }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Longitude</td>
                                <td>{{ $place->longitude }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Category Id</td>
                                <td>{{ $place->category_id }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Visibility Id</td>
                                <td>{{ $place->visibility_id }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Author</td>
                                <td>{{ $user->name }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Updated At</td>
                                <td>{{ $place->updated_at }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Created At</td>
                                <td>{{ $place->created_at }}</td>
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
                   <form method="post" action="{{ route('places.destroy', $place) }}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="{{ route('places.index') }}" role="button">See Place List</a>
                        <a class="btn btn-primary" href="{{ route('places.edit', $place) }}" role="button">Edit</a>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
