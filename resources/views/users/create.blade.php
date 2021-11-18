<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(ucfirst($tipo)) }}
        </h2>
    </x-slot>

    <div class="container mt-2">
        @if(in_array($tipo, ['propiedades', 'inversiones']))
            <inmueble-component :inmueble="{{ json_encode($inmueble) }}" :tipo="`{{ $tipo }}`" :caracteristicas="{{ json_encode($caracteristicas) }}" :inversion="{{ json_encode($inversion) }}"></inmueble-component>
        @else
            <desarrollo-component :inmueble="{{ json_encode($inmueble) }}" :tipo="`{{ $tipo }}`" :caracteristicas="{{ json_encode($caracteristicas) }}" :inversion="{{ json_encode($inversion) }}"></desarrollo-component>
        @endif
    </div>
</x-app-layout>
