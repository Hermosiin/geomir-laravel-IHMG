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
                                <td scope="col">{{ __('fpp_traduct.name') }}</td>
                                <td>{{ $place->name }}</td>
                           </tr>
                           <tr>
                                <td scope="col">{{ __('fpp_traduct.description') }}</td>
                                <td>{{ $place->description }}</td>
                           </tr>
                           <tr>
                                <td scope="col">{{ __('fpp_traduct.file') }}</td>
                                <td>{{ $place->file_id }}</td>
                           </tr>
                           <tr>
                                <td scope="col">{{ __('fpp_traduct.latitude') }}</td>
                                <td>{{ $place->latitude }}</td>
                           </tr>
                           <tr>
                                <td scope="col">{{ __('fpp_traduct.longitude') }}</td>
                                <td>{{ $place->longitude }}</td>
                           </tr>
                           <tr>
                                <td scope="col">{{ __('fpp_traduct.category') }}</td>
                                <td>{{ $place->category_id }}</td>
                           </tr>
                           <tr>
                                <td scope="col">{{ __('fpp_traduct.visibility') }}</td>
                                <td>{{ $place->visibility_id }}</td>
                           </tr>
                           <tr>
                                <td scope="col">{{ __('fpp_traduct.author') }}</td>
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
                                            <label for="name">{{ __('fpp_traduct.name') }}</label>
                                            <input type="text" style="background-color:white;" value="{{ $place->name }}" id="name" name="name" class="form-control" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="description">{{ __('fpp_traduct.description') }}</label>
                                            <input type="text" style="background-color:white;" value="{{ $place->description }}" id="description" name="description" class="form-control" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="upload">{{ __('fpp_traduct.file') }}</label>
                                            <input type="file" style="background-color:white;" id="upload" class="form-control" name="upload" class="form-control"/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="latitude">{{ __('fpp_traduct.latitude') }}</label>
                                            <input type="text" style="background-color:white;" value="{{ $place->latitude }}" id="latitude" name="latitude" class="form-control" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="longitude">{{ __('fpp_traduct.longitude') }}</label>
                                            <input type="text" style="background-color:white;" value="{{ $place->longitude }}" id="longitude" name="longitude" class="form-control" required/>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="category_id">{{ __('fpp_traduct.category') }}</label>
                                            <input type="text" style="background-color:white;" value="{{ $place->category_id }}" id="category_id" name="category_id" class="form-control" required/>
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
                                            <label for="visibility_id">{{ __('fpp_traduct.visibility') }}</label>
                                            <select style="background-color:white;" name="visibility_id" class="form-control">
                                                @foreach ($visibilities as $visibility)
                                                    @if ($visibility->id == $place->visibility_id)
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
                        <a class="btn btn-primary" href="{{ route('places.index') }}" role="button">Go back</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                   
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
