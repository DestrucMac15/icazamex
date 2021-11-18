<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

        </h2>
    </x-slot>

    <div class="container mt-2">
        <posts-component>
            <div slot="toolbar">
                <a class="btn btn-primary" href="{{ route('blog.create') }}">
                    <i class="bi bi-plus-square-fill m-0 p-0 mt--4"></i>
                    Nuevo
                </a>
            </div>
        </posts-component>
    </div>
</x-app-layout>
