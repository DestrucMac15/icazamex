<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        </h2>
    </x-slot>

    <div class="container mt-2">
        <users-component :model="{{ json_encode($user) }}"></users-component>
    </div>
</x-app-layout>
