@extends('layouts.app')
 
@section('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.15.0/Sortable.min.js"></script>
<h1 style="color:white; left:43%; position:absolute; margin-top:20px;" id="leer" onclick="leerText()">Sobre Nosotros</h1>

    <div class="div-about">

        <div class="container">
            
            <div class="carta" id="boton-leer">
                <div class="contenedor-imagenes">
                    <div class="caja1-marc" id="fotoAudio1"></div>
                    <div class="caja2-marc" id="abrirModal1"></div>
                    <audio id="jul">
                        <source src="./img/jul5.mp3" type="audio/mp3"></source>
                    </audio>
                </div>
                <div class="contenido contenido-boton">
                    <h1>Marc Giménez</h1>
                    <button class="trabajo-marc" ><p style="display:none;">Botón Marc</p></button>
                </div>
                
            </div>

            <dialog id="modal1" class="miModal">
                <h2 class="header-modal">Vídeo Presentació Marc</h2>
                <br>
                <br> 
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="false" >
                    <div class="carousel-inner" >
                        <div class="carousel-item active">  
                            <video id="miquel" width="100%" height="70%" autoplay="true" muted="true" loop="true">
                                <source src="./img/golmessi93.mp4" type="video/mp4">
                            </video>
                            <div class="flex-botones-model">
                                <button onclick="playVid1Marc()" type="button">Play Video</button>
                                <button onclick="pauseVid1Marc()" type="button">Pause Video</button>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <video id="messi2" width="100%" height="540px">
                                <source src="./img/miqueel.mp4" type="video/mp4">
                            </video>
                            <div class="flex-botones-model">
                                <button onclick="playVid2Marc()" type="button">Play Video</button>
                                <button onclick="pauseVid2Marc()" type="button">Pause Video</button>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <br>
                <br>
                <div class="flex-botones-model">
                    <button id="cerrarModal1">Cerrar</button>
                </div>
            </dialog>


            <div class="carta">
                <div class="contenedor-imagenes">
                    <div class="caja1-ismael" id="fotoAudio2"></div>
                    <div class="caja2-ismael" id="abrirModal2"></div>
                    <audio id="shakira">
                        <source src="./img/shakira.mp3" type="audio/mp3"></source>
                    </audio>

                </div>
                <div class="contenido">
                    <h3>Ismael Hermoso</h3>
                    <button class="trabajo-ismael"><p style="display:none;">Botón Ismael</p></button>
                </div>               

            </div>
            <dialog id="modal2" class="miModal">
                <h2 class="header-modal">Vídeo Presentació Ismael</h2>
                <br>
                <br> 
                <div id="carouselExampleControls2" class="carousel slide" data-bs-ride="false" >
                    <div class="carousel-inner" >
                        <div class="carousel-item active">  
                            <video id="csgo1" width="100%" height="70%" autoplay="true" muted="true" loop="true">
                                <source src="./img/csgo2.mp4" type="video/mp4">
                            </video>
                            <div class="flex-botones-model">
                                <button onclick="playVid1Ismael()" type="button">Play Video</button>
                                <button onclick="pauseVid1Ismael()" type="button">Pause Video</button>
                            </div>
                        </div>
                        <div class="carousel-item ">
                            <video id="csgo2" width="100%" height="540px">
                                <source src="./img/csgo1.mp4" type="video/mp4">
                            </video>
                            <div class="flex-botones-model">
                                <button onclick="playVid2Ismael()" type="button">Play Video</button>
                                <button onclick="pauseVid2Ismael()" type="button">Pause Video</button>
                            </div>
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls2" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
                <br>
                <br>
                <div class="flex-botones-model">
                    <button id="cerrarModal2">Cerrar</button>
                </div>
            </dialog>

            
            
        </div>


       

    </div>

    <nav class="div-bnt-menu">
        <a href="{{ route('dashboard') }}" role="button" title="Enrere" ><i class="fa-solid fa-arrow-rotate-left"></i></a>
    </nav>
    
    <script>

        let jul = document.getElementById('jul');
        let shakira = document.getElementById('shakira');

        var imagen1=document.getElementById('fotoAudio1');

        window.addEventListener('load', iniciar1, false);
        window.addEventListener('load', parar1, false);

        function iniciar1(){
            imagen1.addEventListener('mouseover', iniciar1F, false);
        }
        function parar1(){
            imagen1.addEventListener('mouseout', parar1F, false);
        }
        function parar1F(){
            jul.pause();
        }
        function iniciar1F(){
            jul.volume = 0.6;
            jul.play();
        }

        var imagen2=document.getElementById('fotoAudio2');

        window.addEventListener('load', iniciar2, false);
        window.addEventListener('load', parar2, false);

        function iniciar2(){
            imagen2.addEventListener('mouseover', iniciar2F, false);
        }
        function parar2(){
            imagen2.addEventListener('mouseout', parar2F, false);
        }
        function parar2F(){
            shakira.pause();
        }
        function iniciar2F(){
            shakira.volume = 0.6;
            shakira.play();
        }

        const btnAbrir1 = document.querySelector("#abrirModal1");
        const btnCerrar1 = document.querySelector("#cerrarModal1");
        const modal1 = document.querySelector("#modal1");

        btnAbrir1.addEventListener("click",()=>{
            modal1.showModal();
        })

        btnCerrar1.addEventListener("click",()=>{
            modal1.close();
        })


        var vid1 = document.getElementById("miquel"); 

        function playVid1Marc() { 
            vid1.play(); 
        } 

        function pauseVid1Marc() { 
            vid1.pause(); 
        }


        var vid2 = document.getElementById("messi2"); 

        function playVid2Marc() { 
            vid2.play(); 
        } 

        function pauseVid2Marc() { 
            vid2.pause(); 
        }

        var vid3 = document.getElementById("csgo1"); 

        function playVid1Ismael() { 
            vid3.play(); 
        } 

        function pauseVid1Ismael() { 
            vid3.pause(); 
        }

        var vid4 = document.getElementById("csgo2"); 

        function playVid2Ismael() { 
            vid4.play(); 
        } 

        function pauseVid2Ismael() { 
            vid4.pause(); 
        }

        const btnAbrir2 = document.querySelector("#abrirModal2");
        const btnCerrar2 = document.querySelector("#cerrarModal2");
        const modal2 = document.querySelector("#modal2");

        btnAbrir2.addEventListener("click",()=>{
            modal2.showModal();
        })

        btnCerrar2.addEventListener("click",()=>{
            modal2.close();
        })

        const dragArea = document.querySelector(".container");

        Sortable.create(dragArea, {

            animation: 350,
            dragClass: "drag"


        });       

        // Aquesta funció fa que quan li donguis un click algun element amb el id "leer" es guardi el contingut, i el llegeixi en castellà.
        function leerText() {
            var texto = document.getElementById("leer").innerText; // Element amb ID = "leer"

            var synth = window.speechSynthesis;

            var msg = new SpeechSynthesisUtterance();

            msg.text = texto; 
            msg.lang = 'es-ES'; // Definim castellà 

            synth.speak(msg);
        } 


        // Definim dos elements, els element pare i l'element fill. 
        const boton = document.getElementById('boton-leer');
        const contenido = document.querySelector('.contenido-boton');

        // Quan li donguis doble click al element pare, l'element fill serà llegit. 

        boton.addEventListener('dblclick', leerContenido);
        function leerContenido() {
            const mensaje = new SpeechSynthesisUtterance();
            mensaje.lang = 'es-ES'; // Definim castellà 
            mensaje.text = contenido.textContent;
            window.speechSynthesis.speak(mensaje);
        }       

        // Definim la funció de llegir la pagina i ens guardem en una constant interna tot el contingut de la pagina. 
        function speakPage() {
            const text = document.body.innerText;
            const synth = window.speechSynthesis;

            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang= 'es-ES'; // Definim castellà 
            synth.speak(utterance);

        }
        // Quan aquesta draçera sigui executada, executara la funcio anterior. 
        document.addEventListener("keydown", (e) => {
        if (e.ctrlKey && e.altKey && e.key === "s") {
            speakPage();
        }
        });
    
    </script>


@endsection