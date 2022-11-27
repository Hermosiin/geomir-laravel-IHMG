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
                               <td>{{ $post->id }}</td>
                           </tr>
                           <tr>
                                <td scope="col">{{ __('fpp_traduct.body') }}</td>
                                <td>{{ $post->body }}</td>
                           </tr>
                           <tr>
                                <td scope="col">{{ __('fpp_traduct.file') }}</td>
                                <td>{{ $post->file_id }}</td>
                           </tr>
                           <tr>
                                <td scope="col">{{ __('fpp_traduct.latitude') }}</td>
                                <td>{{ $post->latitude }}</td>
                           </tr>
                           <tr>
                                <td scope="col">{{ __('fpp_traduct.longitude') }}</td>
                                <td>{{ $post->longitude }}</td>
                           </tr>
                           <tr>
                                <td scope="col">{{ __('fpp_traduct.visibility') }}</td>
                                <td>{{ $visibility->name }}</td>
                           </tr>
                           <tr>
                                <td scope="col">{{ __('fpp_traduct.author') }}</td>
                                <td>{{ $user->name }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Created At</td>
                                <td>{{ $post->created_at }}</td>
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
                   @if(!$post->islike)
                         <form action="{{ route('posts.like',$post) }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <button class="btn btn-primary">Add to likes</button>
                         </form>
                    @else
                         <form action="{{ route('posts.unlike',$post) }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <button class="btn btn-primary">Remove from likes</button>
                         </form>
                    @endif
                    <br>
                   <form method="post" action="{{ route('posts.destroy', $post) }}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="{{ route('posts.index') }}" role="button">Go back</a>
                        <a class="btn btn-primary" href="{{ route('posts.edit', $post) }}" role="button">Edit</a>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
