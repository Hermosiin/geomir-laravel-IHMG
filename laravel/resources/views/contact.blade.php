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

    <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a href="#">
                        <img src="public" alt="Logo de Geomir">
                    </a>
                </figure>
            </div>
            <div class="box">
                <h2>SOBRE NOSOTROS</h2>
                <p>Pagina dedica al videjuego Counter Strike.</p>
                <p>Tenemos todo tipo de informacion sobre armas, mapas, modos y mejores jugadores del momento.</p>
            </div>
            <div class="box">
                <h2>SIGUENOS</h2>
                <div class="red-social">
                    <a href="https://es-la.facebook.com/CSGLOB/" target="_blank" class="fa fa-facebook"></a>
                    <a href="https://www.instagram.com/hermosiin/?hl=es" target="_blank" class="fa fa-instagram"></a>
                    <a href="https://twitter.com/hermosiin" target="_blank" class="fa fa-twitter"></a>
                    <a href="https://www.youtube.com/c/FlipiNLosFieles" target="_blank" class="fa fa-youtube"></a>
                </div>
            </div>
        </div>
    </footer>
</div>

@endsection