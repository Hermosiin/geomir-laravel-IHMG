@extends('layouts.app')
 
@section('content')

    <div class="div-about">
        <div class="container">
            <div class="carta">
                <div class="contenedor-imagenes">
                    <div class="caja1-marc" id="fotoAudio1"></div>
                    <div class="caja2-marc"></div>
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
            jul.volume = 0.1;
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
            shakira.volume = 0.1;
            shakira.play();
        }
        
    </script>

















@endsection