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
               <div class="card-header">{{ __('Places') }}</div>
               <div class="card-body">
                   <table class="table">
                       <thead>
                        <form method="post" action="{{ route('places.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <tr>
                                        <td>
                                            <label for="name">Name</label>
                                            <input type="text" id="name" name="name" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="description">Description</label>
                                            <input type="text" id="description" name="description" class="form-control"/>
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
                                            <label for="category_id">Category Id</label>
                                            <input type="text" id="category_id" name="category_id" class="form-control"/>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td>
                                            <label for="visibility_id">Visibility Id</label>
                                            <input type="text" id="visibility_id" name="visibility_id" class="form-control"/>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td>
                                            <label for="visibility_id">Visibility</label>
                                            <select name="visibility_id" class="form-control">
                                                @foreach ($visibilities as $visibility)
                                                    <option value="{{ $visibility->id }}">{{ $visibility->name }}</option>
                                                   
                                                @endforeach

                                            </select>                                           
                                        </td>
                                    </tr>
                                </div>

                                <td><button type="submit" class="btn btn-primary">Create</button>
                                &nbsp
                                <button type="reset" class="btn btn-secondary">Reset</button></td>
                            </form>
                       </thead>
                   </table>
                   <a class="btn btn-primary" href="{{ route('places.create') }}" role="button">Add New Place</a>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection