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
                               <td scope="col">Name</td>
                               <td scope="col">Description</td>
                               <td scope="col">File Id</td>
                               <td scope="col">Latitude</td>
                               <td scope="col">Longitude</td>
                               <td scope="col">Category Id</td>
                               <td scope="col">Visibility Id</td>
                               <td scope="col">Author Id</td>
                               <td scope="col">Created At</td>
                               <td scope="col">Updated At</td>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($places as $place)
                           <tr>
                                <td>{{ $place->id }}</td>
                                <td>{{ $place->name }}</td>
                                <td>{{ $place->description }}</td>
                                <td>{{ $place->file_id }}</td>
                                <td>{{ $place->latitude }}</td>
                                <td>{{ $place->longitude }}</td>
                                <td>{{ $place->category_id }}</td>
                                <td>{{ $place->visibility_id }}</td>
                                <td>{{ $place->author_id }}</td>
                                <td>{{ $place->created_at }}</td>
                                <td>{{ $place->updated_at }}</td>

                                <td><a class="btn btn-primary" href="{{ route('places.show', $place) }}" role="button">👁️</a></td>
                                <td><a class="btn btn-primary" href="{{ route('places.edit', $place) }}" role="button">📝</a></td>
                                <td><form method="post" action="{{ route('places.destroy', $place) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">🗑️</button>
                                </form></td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                   <a class="btn btn-primary" href="{{ route('dashboard') }}" role="button">Go To Dashbord</a>
                   <a class="btn btn-primary" href="{{ route('places.create') }}" role="button">Add New Place</a>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
