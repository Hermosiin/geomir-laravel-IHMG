@extends('layouts.app')
 
@section('content')
<script src="https://kit.fontawesome.com/3e4c1a6931.js" crossorigin="anonymous"></script>
<div class="container">
    <div class="justify-content-center width:100%;">
    <div class="flex-places">

            @foreach ($places as $place)
            <div class="div-places">

                <img class="mapa-places" src="./img/mapa.png"/>

                <div style="width: 100%;">
                    <div style="display:flex;">                 
                        @foreach ($files as $file)
                            @if($file->id == $place->file_id)
                                <img class="img-place" src='{{ asset("storage/{$file->filepath}") }}'/>
                            @endif
                        @endforeach    

                        <div class="grid" >
                            <div class="div-foto-nom" >
                                <img src="./img/foto.webp" class="img-perfil"  />    
                                <h1 class="h1-nom-places" >{{ $place->user->name }}</h1>
                            </div>
                            <div class="estrellas" style="margin-top:auto;">
                                <a href=""><i class="fa-solid fa-star"></i></a>
                                <a href=""><i class="fa-solid fa-star"></i></a>
                                <a href=""><i class="fa-solid fa-star"></i></a>
                                <a href=""><i class="fa-solid fa-star"></i></a>
                                <a href=""><i class="fa-solid fa-star"></i></a>
                            </div>
                        </div>  
                       
                    </div>
                    
                    

                    <div class="div-btn-post">
                        <a href="" ><i class="fa-solid fa-comments"></i></a>

                        <a class="btn-derecha" href="{{ route('places.show', $place) }}" role="button"><i class="fa-sharp fa-solid fa-eye"></i></a>
                        

                    </div>

                    <div class="caja-comentarios-places">
                        <p> {{ $place->description }}</p>
                    </div>
                    
                </div>

            </div>

            @endforeach

        
    </div>

    <nav class="div-bnt-menu">
        <a href="{{ route('dashboard') }}" role="button" title="Enrere"><i class="fa-solid fa-arrow-rotate-left"></i></a>
        <a href="{{ route('places.create') }}" role="button" title="Crear Nou"><i class="fa-solid fa-plus"></i></a>
    </nav>
</div>

@endsection