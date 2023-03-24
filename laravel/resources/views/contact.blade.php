@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
     integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI="
     crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
     integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM="
     crossorigin=""></script>

<style>

    /* para que no salga la barra de scroll */
    ::-webkit-scrollbar {
        display: none;
    
    }

    /* modificacion mapa tamaño y borde */
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
        <div class="texto-encima" id="startButton">CONTACTA'NS!!!</div>
        <div class="texto-encima2">Envia el teu missatge</div>
        <a class="boton-contacto " href="./form-contacte" target="blank" accesskey="f">Formulari de contacte</a>
    </div>
        
    <div class="mapa-contact">
        <h1>Vols visitar-nos?</h1>
        <h2>Ubica'ns al mapa</h2>
        <div id="map">
            <script>
                //creacion mapa
                var map = L.map('map').setView([41.2310177, 1.7279358], 17);
                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                L.Routing.control({
                waypoints: [
                    L.latLng(41.2313177, 1.72849),
                    L.latLng(41.22256157954006, 1.710204524207295)
                ]
                }).addTo(map);

                //creacion circulo rojo mapa
                var circle = L.circle([41.2310177, 1.7285358], {
                    color: 'red',
                    fillColor: '#f03',
                    fillOpacity: 0.5,
                    radius: 100
                }).addTo(map);

                // 4.2 ATAJOS
                document.onkeyup = function(e) {

                //esto muestra mi latitud y longitud
                if (e.ctrlKey && e.altKey && e.which == 71) {

                    navigator.geolocation.getCurrentPosition(success);
                    function success(position) {
                    var coordenadas = position.coords;
                    alert("Tu posición ahora mismo es:"+
                    "\n- Tu Latitud : " + coordenadas.latitude+
                    "\n- Tu Longitud: " + coordenadas.longitude);
                    };

                } 
                //esto centra el mapa en el mir
                else if (e.ctrlKey && e.altKey && e.which == 67) {
                    alert("Acepta para centrar el mapa");
                    map.remove();

                    map = L.map('map').setView([41.2310177, 1.7279358], 17);
                    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    maxZoom: 19,
                    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
                }).addTo(map);

                circle = L.circle([41.2310177, 1.7285358], {
                    color: 'red',
                    fillColor: '#f03',
                    fillOpacity: 0.5,
                    radius: 100
                }).addTo(map);

                navigator.geolocation.getCurrentPosition(showPosition);

                function showPosition(position) {
                    marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
                    marker.bindPopup("Usted esta aquí").openPopup();
                }

                }
                };
                        
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
                    <a href="https://es-la.facebook.com/CSGLOB/" target="_blank" class="fa fa-facebook">FB</a>
                    <a href="https://www.instagram.com/hermosiin/?hl=es" target="_blank" class="fa fa-instagram">INS</a>
                    <a href="https://twitter.com/hermosiin" target="_blank" class="fa fa-twitter">TW</a>
                    <a href="https://www.youtube.com/c/FlipiNLosFieles" target="_blank" class="fa fa-youtube">YT</a>
                </div>
            </div>
        </div>
    </footer>
</div>

<script>
    //marcador puntero mapa
    navigator.geolocation.getCurrentPosition(showPosition);

    function showPosition(position) {
        var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
        marker.bindPopup("Usted esta aquí").openPopup();
    }

    // Creamos una instancia de la API SpeechRecognition
    const recognition = new webkitSpeechRecognition();

    // Configuramos la instancia
    recognition.continuous = true;
    recognition.interimResults = false;
    recognition.lang = 'es-ES';

    // Al activarse el botón, empezamos a escuchar la voz del usuario
    document.getElementById('startButton').addEventListener('click', () => {
        recognition.start();
    });

    // Cuando se detecta una palabra clave, se sube o baja la página
    recognition.onresult = (event) => {
    const last = event.results.length - 1;
    const command = event.results[last][0].transcript.toLowerCase(); 

    console.log(command);

    // Quan l'aplicació escolti qualsevol d'aquestes paraules en conctret, executarà la funció que conté. 
    if (command.includes('subir página')) { 
        window.scrollBy(0, -window.innerHeight); // pujar un tant percernt de la pàgina

    } else if (command.includes("acercar")) {
        document.body.style.zoom = "150%"; // + 150% de zoom

    }else if (command.includes("acercar más")) {
        document.body.style.zoom = "200%"; // + 200% de zoom

    }else if (command.includes("alejar")) {
        document.body.style.zoom = "100%"; // + 100% de zoom

    }else if (command.includes("alejar más")) {
        document.body.style.zoom = "50%"; // + 50% de zoom
    }
    };

    // Draçera de teclat per restablir tant el zoom com la posició. 
    document.addEventListener("keydown", (e) => {
        if (e.ctrlKey && e.altKey && e.key === "f") {
            document.body.style.zoom = "100%"; // +100% de zoom
            window.scrollTo(0, 0); // Pujar adalt del tot. 
        } 
    });
</script>

@endsection