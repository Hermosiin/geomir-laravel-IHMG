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
                           <tr>
                               <td scope="col">ID</td>
                               <td scope="col">Filepath</td>
                               <td scope="col">Filesize</td>
                               <td scope="col">Created</td>
                               <td scope="col">Updated</td>
                           </tr>
                       </thead>
                       <tbody>
                           @foreach ($files as $file)
                           <tr>
                                <td>{{ $file->id }}</td>
                                <td>{{ $file->filepath }}</td>
                                <td>{{ $file->filesize }}</td>
                                <td>{{ $file->created_at }}</td>
                                <td>{{ $file->updated_at }}</td>
                                <td><a class="btn btn-primary" href="{{ route('files.show', $file) }}" role="button">👁️</a></td>
                                <td><a class="btn btn-primary" href="{{ route('files.edit', $file) }}" role="button">📝</a></td>
                                <td><form method="post" action="{{ route('files.destroy', $file) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-primary">🗑️</button>
                                </form></td>
                           </tr>
                           @endforeach
                       </tbody>
                   </table>
                   <a class="btn btn-primary" href="{{ route('dashboard') }}" role="button">Go To Dashbord</a>
                   <a class="btn btn-primary" href="{{ route('files.create') }}" role="button">Add New File</a>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
