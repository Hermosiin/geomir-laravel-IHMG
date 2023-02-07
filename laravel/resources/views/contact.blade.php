@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>

<style>
    ::-webkit-scrollbar {
        display: none;
    
    }

    #map { 

        height: 700px;
        width: 80%;
        margin: 0 auto;
        border:2px solid black ;
    
    }


</style>
<div class="flex-contact">
    <div class="fondo-cont">
        <video src="./img/quemiras.mp4" class="video-que-miras" autoplay="true" muted="true" loop="true"></video>
        <div class="texto-encima">CONTACTA'NS!!!</div>
        <div class="texto-encima2">Envia el teu missatge</div>
        <a class="boton-contacto " href="./form-contacte" target="blank" accesskey="f">Formulari de contacte</a>
    </div>
        
    <div class="mapa-contact">
        <h1>Vols visitar-nos?</h1>
        <h3>Ubica'ns al mapa</h3>
        <div id="map"><script>var map = L.map('map').setView([41.2310177, 1.7279358], 17);
                                L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                maxZoom: 19,
                                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                            }).addTo(map);

                            var circle = L.circle([41.2310177, 1.7285358], {
                                color: 'red',
                                fillColor: '#f03',
                                fillOpacity: 0.5,
                                radius: 100
                            }).addTo(map);
                            

                        </script>
        </div>

    </div>

    <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <div class="logo-cont">
                    <img src="./img/logo.png" alt="Logo de Geomir">

                </div> 
            </div>
            <div class="box">
                <h2>SOBRE NOSOTROS</h2>
                <p>Pagina dedica para darnos a conocer.</p>
                <p>Tenemos todo tipo de informacion sobre los mejores restaurantes y establecimientos de tu zona.</p>
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

<script>

    navigator.geolocation.getCurrentPosition(showPosition);

    function showPosition(position) {
        var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
        marker.bindPopup("Usted esta aquí").openPopup();
    }

</script>

@endsection