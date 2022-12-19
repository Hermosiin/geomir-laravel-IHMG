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
    
                </div>
                
            </div>

            <dialog id="modal1" class="miModal">
                <h2 class="header-modal">Vídeo Presentació Marc</h2>
                <br>
                <br> 
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="false" >
                    <div class="carousel-inner" >
                        <div class="carousel-item active">
                            <video width="100%" height="70%" autoplay>
                                <source src="./img/golmessi93.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="carousel-item">
                            <video id="Messi" width="100%" height="70%">
                                <source src="./img/golmessibilbao.mp4" type="video/mp4">
                            </video>
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
                    <button onclick="playVid1()" type="button">Play Video</button>
                    <button onclick="pauseVid1()" type="button">Pause Video</button>
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
                    <button class="trabajo-ismael"></button>
                </div>               

            </div>
            <dialog id="modal2" class="miModal">
                <h2 class="header-modal">Vídeo Presentació Ismael</h2>
                <br>
                <br> 
                <div id="carouselExampleControls2" class="carousel slide" data-bs-ride="false" >
                    <div class="carousel-inner" >
                        <div class="carousel-item active">
                            <video width="100%" height="70%" autoplay>
                                <source src="./img/csgo2.mp4" type="video/mp4">
                            </video>
                        </div>
                        <div class="carousel-item">
                            <video id="Csgo" width="100%" height="70%">
                                <source src="./img/csgo1.mp4" type="video/mp4">
                            </video>
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
                    <button onclick="playVid2()" type="button">Play Video</button>
                    <button onclick="pauseVid2()" type="button">Pause Video</button>
                    <button id="cerrarModal2">Cerrar</button>
                </div>
            </dialog>

            
            
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


        var vid = document.getElementById("Messi"); 

        function playVid1() { 
            vid.play(); 
        } 

        function pauseVid1() { 
            vid.pause(); 
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


        var vid2 = document.getElementById("Csgo"); 

        function playVid2() { 
            vid2.play(); 
        } 

        function pauseVid2() { 
            vid2.pause(); 
        }





        
    </script>

















@endsection