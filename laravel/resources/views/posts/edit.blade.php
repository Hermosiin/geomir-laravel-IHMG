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
                                <td scope="col">Body</td>
                                <td>{{ $post->body }}</td>
                           </tr>
                           <tr>
                                <td scope="col">File Id</td>
                                <td>{{ $post->file_id }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Latitude</td>
                                <td>{{ $post->latitude }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Longitude</td>
                                <td>{{ $post->longitude }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Visibility Id</td>
                                <td>{{ $post->visibility_id }}</td>
                           </tr>
                           <tr>
                                <td scope="col">Author</td>
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
                    <form method="post" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group" style="margin-bottom: 10px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>
                                            <label for="body">Body</label>
                                            <input type="text" value="{{ $post->body }}" id="body" name="body" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="upload">File</label>
                                            <input type="file" id="upload" class="form-control" name="upload" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="latitude">Latitude</label>
                                            <input type="text" value="{{ $post->latitude }}" id="latitude" name="latitude" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="longitude">Longitude</label>
                                            <input type="text" value="{{ $post->longitude }}" id="longitude" name="longitude" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="visibility_id">Visibility Id</label>
                                            <input type="text" value="{{ $post->visibility_id }}" id="visibility_id" name="visibility_id" class="form-control"/>
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <a class="btn btn-primary" href="{{ route('posts.index') }}" role="button">See Post List</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                   
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
