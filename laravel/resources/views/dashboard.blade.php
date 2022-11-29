<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div>

    @section('content')
        <main>
        <aside class="esconder-aside">
            <nav>
                <ul class="botonera2">
                    <li><a href="{{ url('/files') }}">{{ __('Files') }}</a>
                    <li><a href="{{ url('/places') }}">{{ __('Places') }}</a>
                    <li><a href="{{ url('/posts') }}">{{ __('Posts') }}</a>
                </ul>

                <div class="perfils-publics">
                    <ul class="botonera-perfils">
                        <h1 class="h1-perfils-publics">PERFILS PÚBLICS</h1>
                        <li><div><img src="/img/logo.png"/><p>Manolo García</p></div>
                        <li><div><img src="/img/logo.png"/><p>Pepe Reina</p></div>
                        <li><div><img src="/img/logo.png"/><p>Marc Gimenez</p></div>
                        <li><div><img src="/img/logo.png"/><p>Lionel Messi</p></div>
                        <li><div><img src="/img/logo.png"/><p>Mi Padre</p></div>

                    </ul>
                </div>
            </nav>
        </aside>
        <article class="img-media"><img src="./img/mapa.jpg"/></article>
        
        

    </main>
    <footer class="mostrar-botones">
        <ul class="botonera2">
            <li><a href="{{ url('/files') }}">{{ __('Files') }}</a>
            <li><a href="{{ url('/places') }}">{{ __('Places') }}</a>
            <li><a href="{{ url('/posts') }}">{{ __('Posts') }}</a>
        </ul>
    </footer>
    @endsection

</x-app-layout>
