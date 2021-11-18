<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>

    <div class="container mt-2">
        <post-component :post="{{ json_encode($post) }}">
        </post-component>
    </div>
</x-app-layout>
