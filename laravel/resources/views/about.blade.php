@extends('layouts.app')
 
@section('content')

    <div class="div-about">
        <div class="container">
            <div class="card">
                <div class="contenedor-imagenes">
                    <div class="caja1-marc" id="fotoAudio1"></div>
                    <div class="caja2-marc"></div>
                    <audio src="./img/jul.mp3" class="enter1"></audio>
                </div>
                <div class="contenido">
                    <h3>Marc Giménez</h3>
                    <button class="trabajo-marc"></button>
                    <a href="#">Vídeo</a>

                </div>
            </div>

            <div class="card">
                <div class="contenedor-imagenes">
                    <div class="caja1-ismael" id="fotoAudio2"></div>
                    <div class="caja2-ismael"></div>
                    <audio src="./img/shakira.mp3" class="enter2"></audio>

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

        let more1 = document.getElementById()('enter1');
        let more2 = document.getElementById()('enter2');

        let audio = document.getElementsByTagName('audio');

        more1.addEventListener('mouseenter', () => {

            audio[0].play()
        });
        more2.addEventListener('mouseenter', () => {

            audio[1].play()
        });
        

    </script>

















@endsection