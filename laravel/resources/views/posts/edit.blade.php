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
                                <td>{{ $post->visibility_id }}</td>
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
                    <form method="post" action="{{ route('posts.update', $post) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group" style="margin-bottom: 10px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>
                                            <label for="body">{{ __('fpp_traduct.body') }}</label>
                                            <input type="text" value="{{ $post->body }}" id="body" name="body" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="upload">{{ __('fpp_traduct.file') }}</label>
                                            <input type="file" id="upload" class="form-control" name="upload" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="latitude">{{ __('fpp_traduct.latitude') }}</label>
                                            <input type="text" value="{{ $post->latitude }}" id="latitude" name="latitude" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="longitude">{{ __('fpp_traduct.longitude') }}</label>
                                            <input type="text" value="{{ $post->longitude }}" id="longitude" name="longitude" class="form-control"/>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td>
                                            <label for="visibility_id">Visibility Id</label>
                                            <input type="text" value="{{ $post->visibility_id }}" id="visibility_id" name="visibility_id" class="form-control"/>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td>
                                            <label for="visibility_id">{{ __('fpp_traduct.visibility') }}</label>
                                            <select name="visibility_id" class="form-control">
                                                @foreach ($visibilities as $visibility)
                                                    @if ($visibility->id == $post->visibility_id)
                                                        <option selected value="{{ $visibility->id }}">{{ $visibility->name }}</option>
                                                    @else
                                                    <option value="{{ $visibility->id }}">{{ $visibility->name }}</option>
                                                    @endif
                                                @endforeach

                                            </select> 
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
