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
                    <form method="post" action="{{ route('places.update', $place) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group" style="margin-bottom: 10px;">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>
                                            <label for="name">Name</label>
                                            <input type="text" value="{{ $place->name }}" id="name" name="name" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="description">Description</label>
                                            <input type="text" value="{{ $place->description }}" id="description" name="description" class="form-control"/>
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
                                            <input type="text" value="{{ $place->latitude }}" id="latitude" name="latitude" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="longitude">Longitude</label>
                                            <input type="text" value="{{ $place->longitude }}" id="longitude" name="longitude" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="category_id">Category Id</label>
                                            <input type="text" value="{{ $place->category_id }}" id="category_id" name="category_id" class="form-control"/>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td>
                                            <label for="visibility_id">Visibility Id</label>
                                            <input type="text" value="{{ $place->visibility_id }}" id="visibility_id" name="visibility_id" class="form-control"/>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td>
                                            <label for="visibility_id">Visibility</label>
                                            <select name="visibility_id" class="form-control">
                                                <option value="1">public</option>
                                                <option value="2">contacts</option>   
                                                <option value="3">private</option>
                                            </select> 
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <a class="btn btn-primary" href="{{ route('places.index') }}" role="button">See Place List</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                   
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
