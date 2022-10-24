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
               <div class="card-header">{{ __('Files') }}</div>
               <div class="card-body">
                   <table class="table">
                       <thead>
                       <form method="post" action="{{ route('files.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="upload">File:</label>
                                <input type="file" class="form-control" name="upload"/>
                            </div>
                            <button type="submit" class="btn btn-primary">Create</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </form>
                       </thead>
                   </table>
                   <a class="btn btn-primary" href="{{ route('files.create') }}" role="button">Add new file</a>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection