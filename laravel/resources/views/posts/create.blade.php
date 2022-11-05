<!--
@if ($errors->any())
<div class="alert alert-danger">
   <ul>
       @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
       @endforeach
   </ul>
</div>
@endif
-->
 
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
                        <form method="post" action="{{ route('posts.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <label for="body">Body</label>
                                            <input type="text" id="body" name="body" class="form-control"/>
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
                                            <input type="text" id="latitude" name="latitude" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="longitude">Longitude</label>
                                            <input type="text" id="longitude" name="longitude" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="visibility_id">Visibility Id</label>
                                            <input type="text" id="visibility_id" name="visibility_id" class="form-control"/>
                                        </td>
                                    </tr>
                                </div>

                                <td><button type="submit" class="btn btn-primary">Create</button>
                                &nbsp
                                <button type="reset" class="btn btn-secondary">Reset</button></td>
                            </form>
                       </thead>
                   </table>
                   <a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">Add New Post</a>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection