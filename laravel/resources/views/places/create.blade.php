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
               <div style="background-color:black; color:white;" class="card-header">{{ __('Places') }}</div>
               <div class="card-body">
                   <table class="table">
                       <thead>
                        <form method="post" id="create" action="{{ route('places.store') }}" enctype="multipart/form-data">
                                @csrf
                                @env(['local','development'])
                                    @vite('resources/js/places/create.js')
                                @endenv

                                <div class="form-group">
                                    <tr>
                                        <td id="name">
                                            <label for="name">{{ __('fpp_traduct.name') }}</label>
                                            <input type="text" style="background-color:white;" id="name" name="name" class="form-control"/>
                                            <div class="error alert alert-danger alert-dismissible fade"></div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="description">
                                            <label for="description">{{ __('fpp_traduct.description') }}</label>
                                            <input type="text" style="background-color:white;" id="description" name="description" class="form-control"/>
                                            <div class="error alert alert-danger alert-dismissible fade"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="upload">
                                            <label for="upload">{{ __('fpp_traduct.file') }}</label>
                                            <input type="file" style="background-color:white;" id="upload" class="form-control" name="upload" class="form-control"/>
                                            <div class="error alert alert-danger alert-dismissible fade"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="latitude">
                                            <label for="latitude">{{ __('fpp_traduct.latitude') }}</label>
                                            <input type="text" style="background-color:white;" id="latitude" name="latitude" class="form-control"/>
                                            <div class="error alert alert-danger alert-dismissible fade"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="longitude">
                                            <label for="longitude">{{ __('fpp_traduct.longitude') }}</label>
                                            <input type="text" style="background-color:white;" id="longitude" name="longitude" class="form-control"/>
                                            <div class="error alert alert-danger alert-dismissible fade"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td id="category_id">
                                            <label for="category_id">{{ __('fpp_traduct.category') }}</label>
                                            <input type="text" style="background-color:white;" id="category_id" name="category_id" class="form-control"/>
                                            <div class="error alert alert-danger alert-dismissible fade"></div>
                                        </td>
                                    </tr>
                                    <!-- <tr>
                                        <td>
                                            <label for="visibility_id">Visibility Id</label>
                                            <input type="text" id="visibility_id" name="visibility_id" class="form-control"/>
                                        </td>
                                    </tr> -->
                                    <tr>
                                        <td id="visibility_id">
                                            <label for="visibility_id">{{ __('fpp_traduct.visibility') }}</label>
                                            <select  style="background-color:white;" name="visibility_id" class="form-control">
                                                @foreach ($visibilities as $visibility)
                                                    <option value="{{ $visibility->id }}">{{ $visibility->name }}</option>
                                                   
                                                @endforeach

                                            </select> 
                                            <div class="error alert alert-danger alert-dismissible fade"></div>
                                        </td>
                                    </tr>
                                </div>

                                <td><button type="submit" class="btn btn-primary">Create</button>
                                &nbsp
                                <button type="reset" class="btn btn-secondary">Reset</button></td>
                            </form>
                       </thead>
                   </table>
                   <a class="btn btn-primary" href="{{ route('places.index') }}" role="button">Go back</a>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection