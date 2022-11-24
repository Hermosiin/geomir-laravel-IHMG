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
        <aside>
            <nav>
                <ul class="botonera2">
                    <li><a href="{{ url('/files') }}" style="text-decoration: none;">{{ __('Files') }}</a>
                    <li><a href="{{ url('/places') }}" style="text-decoration: none;">{{ __('Places') }}</a>
                    <li><a href="{{ url('/posts') }}" style="text-decoration: none;">{{ __('Posts') }}</a>
                </ul>

                <div class="perfils-publics">
                    <ul class="botonera-perfils">
                        <h1 style="color:white; justify-content:center; margin-top:8px; font-size:4vh;" >PERFILS PÚBLICS</h1>
                        <li><div style="display:flex;"><img style="height:100%; width: 20%;" src="/img/logo.png"/><p style="font-size:3vh; margin-top:7px; margin-left:6px;">Manolo García</p></div>
                        <li><div style="display:flex;"><img style="height:100%; width: 20%;" src="/img/logo.png"/><p style="font-size:3vh; margin-top:7px; margin-left:6px;">Pepe Reina</p></div>
                        <li><div style="display:flex;"><img style="height:100%; width: 20%;" src="/img/logo.png"/><p style="font-size:3vh; margin-top:7px; margin-left:6px;">Marc Gimenez</p></div>
                        <li><div style="display:flex;"><img style="height:100%; width: 20%;" src="/img/logo.png"/><p style="font-size:3vh; margin-top:7px; margin-left:6px;">Lionel Messi</p></div>
                        <li><div style="display:flex;"><img style="height:100%; width: 20%;" src="/img/logo.png"/><p style="font-size:3vh; margin-top:7px; margin-left:6px;">Mi Padre</p></div>

                    </ul>
                </div>
            </nav>
        </aside>
        <article><img src="./img/mapa.jpg"/></article>
    </main>
    @endsection

</x-app-layout>
