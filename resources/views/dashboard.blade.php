<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-9 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                {{ __("You're logged in!") }}
            </div>
        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-5">
            <h3 class="p-6 pb-1 text-2xl font-medium">
                ¡Bienvenido {{ Auth::user()->name }}!
            </h3>
            <div class="p-6 pt-3 text-gray-900">
                Tu centro de control para administrar proveedores de equipos médicos en Argentina. Simplifica tus operaciones, gestiona tus proveedores de manera eficiente y optimiza tus procesos con nuestra plataforma intuitiva.
            </div>
        </div>
            
    </div>
</x-app-layout>
