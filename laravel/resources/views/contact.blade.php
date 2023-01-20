@extends('layouts.app')

@section('content')

<style>
    ::-webkit-scrollbar {
    display: none;
}

</style>
<div class="flex-contact">
    <div class="fondo-cont">
        <video src="./img/quemiras.mp4" class="video-que-miras" autoplay="true" muted="true" loop="true"></video>
        <div class="texto-encima">CONTACTA'NS!!!</div>
        <div class="texto-encima2">Envia el teu missatge</div>
        <button class="boton-contacto">Formulari de contacte</button>
    </div>
        
    <div class="mapa-contact">

    </div>
</div>
@endsection