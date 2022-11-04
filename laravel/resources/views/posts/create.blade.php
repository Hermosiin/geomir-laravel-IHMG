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
                                <label for="upload">Posts:</label>
                                <input type="file" class="form-control" name="upload"/>
                                <label for="upload">Posts:</label>
                                <input type="file" class="form-control" name="upload"/>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-primary">Create</button>
                            &nbsp
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </form>
                       </thead>
                   </table>
                   <a class="btn btn-primary" href="{{ route('files.create') }}" role="button">Add New Post</a>
               </div>
           </div>
       </div>
   </div>
</div
@endsection