@extends('layouts.app')
 
@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">{{ __('Posts') }}</div>
               <div class="card-body">
                   <table class="table">
                       <thead>
                           <tr>
                               <td scope="col">Id</td>
                               <td scope="col">Body</td>
                               <td scope="col">File Id</td>
                               <td scope="col">Latitude</td>
                               <td scope="col">Longitude</td>
                               <td scope="col">Visibility Id</td>
                               <td scope="col">Author Id</td>
                               <td scope="col">Created At</td>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($posts as $post)
                           <tr>
                                <td>{{ $post->id }}</td>
                                <td>{{ $post->body }}</td>
                                <td>{{ $post->file_id }}</td>
                                <td>{{ $post->latitude }}</td>
                                <td>{{ $post->longitude }}</td>
                                <td>{{ $post->visibility_id }}</td>
                                <td>{{ $post->author_id }}</td>
                                <td>{{ $post->created_at }}</td>

                                <td><a class="btn btn-primary" href="{{ route('posts.show', $post) }}" role="button">👁️</a></td>
                                <td><a class="btn btn-primary" href="{{ route('posts.edit', $post) }}" role="button">📝</a></td>
                                <td><form method="post" action="{{ route('posts.destroy', $post) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">🗑️</button>
                                </form></td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                   <a class="btn btn-primary" href="{{ route('dashboard') }}" role="button">Go To Dashbord</a>
                   <a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">Add New Post</a>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
