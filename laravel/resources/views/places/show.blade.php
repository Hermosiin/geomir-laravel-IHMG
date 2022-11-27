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
                                <td>{{ $visibility->name }}</td>
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
                           <tr>
                                <td scope="col">Favorites</td>
                                <td>{{ $favorites }}</td>
                           </tr>
                       </thead>
                   </table>

                    @if($control == true)
                            <form method="post" action="{{ route('places.unfavorite',$place) }}" enctype="multipart/form-data">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-primary" type="submit">Remove from favorites</button>
                            </form>  
                    @else 
                         <form method="post" action="{{ route('places.favorite',$place) }}" enctype="multipart/form-data">
                              @csrf
                              <button class="btn btn-primary" type="submit">Add to favorites</button>
                         </form>   
                    @endif    

                    <br>

                   <form method="post" action="{{ route('places.destroy', $place) }}" enctype="multipart/form-data">
                        @csrf
                        @method('DELETE')
                        <a class="btn btn-primary" href="{{ route('places.index') }}" role="button">Go back</a>
                        <a class="btn btn-primary" href="{{ route('places.edit', $place) }}" role="button">Edit</a>
                        <button type="submit" class="btn btn-primary">Delete</button>
                    </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
