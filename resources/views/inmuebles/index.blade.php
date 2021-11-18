<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __(ucfirst($tipo)) }}
        </h2>
    </x-slot>

    @php
    $route = "$tipo.create";
    @endphp

    <div class="container mt-2">
        @if(in_array($tipo, ['propiedades', 'inversiones']))
            <inmuebles-component :tipo="`{{ $tipo }}`">
                <div slot="toolbar">
                    <a class="btn btn-primary" href="{{ route($route) }}">
                        <i class="bi bi-plus-square-fill m-0 p-0 mt--4"></i>
                        Nuevo
                    </a>
                </div>
            </inmuebles-component>
        @else
            <desarrollos-component :tipo="`{{ $tipo }}`">
                <div slot="toolbar">
                    <a class="btn btn-primary" href="{{ route($route) }}">
                        <i class="bi bi-plus-square-fill m-0 p-0 mt--4"></i>
                        Nuevo
                    </a>
                </div>
            </desarrollos-component>
        @endif
    </div>
</x-app-layout>
