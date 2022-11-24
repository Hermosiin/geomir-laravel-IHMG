@extends('layouts.app')
 
@section('content')
<script src="https://kit.fontawesome.com/3e4c1a6931.js" crossorigin="anonymous"></script>
<div class="container">
    <div class="justify-content-center width:100%;">
    <div class="flex-post">

            @foreach ($posts as $post)
            <div class="div-posts">

                <div class="div-foto-nom" >
                    <img src="./img/foto.jfif" class="img-perfil"  />    
                    <h1 class="h1-nom">{{ $post->author_id }}</h1>
                </div>  


                
                @foreach ($files as $file)
                    @if($file->id == $post->file_id)
                        <img class="img-post" src='{{ asset("storage/{$file->filepath}") }}'/>
                    @endif
                @endforeach    
                

                <div class="div-btn-post">
                    <a href="" ><i class="fa-solid fa-heart"></i></a>
                    <a href="" ><i class="fa-solid fa-comments"></i></a>
                    <a class="btn-derecha" href="{{ route('posts.show', $post) }}" role="button"><i class="fa-sharp fa-solid fa-eye"></i></a>
                    

                </div>

                <div class="caja-comentarios">
                    <p> {{ $post->body }}</p>
                </div>

            </div>

            @endforeach

        
    </div>

    <nav class="div-bnt-menu">
        <a href="{{ route('dashboard') }}" role="button" title="Enrere"><i class="fa-solid fa-arrow-rotate-left"></i></a>
        <a href="{{ route('posts.create') }}" role="button" title="Crear Nou"><i class="fa-solid fa-plus"></i></a>
    </nav>
</div>

@endsection