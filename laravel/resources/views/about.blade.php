@extends('layouts.app')
 
@section('content')

    <div class="div-about">
        <div class="container">
            <div class="carta">
                <div class="contenedor-imagenes">
                    <div class="caja1-marc" id="fotoAudio1"></div>
                    <div class="caja2-marc" id="abrirModal1"></div>
                    <audio id="jul">
                        <source src="./img/jul5.mp3" type="audio/mp3"></source>
                    </audio>
                </div>
                <div class="contenido">
                    <h3>Marc Giménez</h3>
                    <button class="trabajo-marc"></button>
                    <a href="#">Vídeo</a>
    
                </div>
                
            </div>

            <dialog id="modal1">
                <h2 class="header-modal">Vídeo Presentació Marc</h2>
                <br>
                <br> 
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <video id="videoJul1" width="100%" height="70%">
                                <source src="./img/jul.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="carousel-item">
                            <img src="./img/marc1.PNG">
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
                    <button onclick="playVid()" type="button">Play Video</button>
                    <button onclick="pauseVid()" type="button">Pause Video</button>
                    <button id="cerrarModal1">Cerrar</button>
                </div>
            </dialog>




            <div class="carta">
                <div class="contenedor-imagenes">
                    <div class="caja1-ismael" id="fotoAudio2"></div>
                    <div class="caja2-ismael"></div>
                    <audio id="shakira">
                        <source src="./img/shakira.mp3" type="audio/mp3"></source>
                    </audio>

                </div>
                <div class="contenido">
                    <h3>Ismael Hermoso</h3>
                    <button class="trabajo-ismael"></button>
                    <a href="#">Vídeo</a>

                </div>
                

            </div>

            
            
        </div>


       

    </div>
    <nav class="div-bnt-menu">
        <a href="{{ route('dashboard') }}" role="button" title="Enrere"><i class="fa-solid fa-arrow-rotate-left"></i></a>
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


        var vid = document.getElementById("videoJul1"); 

        function playVid() { 
            vid.play(); 
        } 

        function pauseVid() { 
            vid.pause(); 
        }

        var vid2 = document.getElementById("videoJul2"); 

        function playVid() { 
            vid2.play(); 
        } 

        function pauseVid() { 
            vid2.pause(); 
        }





        
    </script>

















@endsection