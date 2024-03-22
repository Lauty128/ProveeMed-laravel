<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Categoria
        </h2>
    </x-slot>

    <div class="py-9 max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <a href="{{ route('dashboard.categories') }}">
            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-4 border border-gray-400 rounded shadow mb-5">
                ← Volver
           </button>
        </a>

        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900">Información sobre la categoria</h1>
            <form method="POST" action="{{ route('dashboard.categories.update', ["id" => $category->id]) }}">
                @csrf
                @method('PUT')

                <div>
                    <label for="nameInput" class="text-gray-600">* Nombre</label>
                    <input type="text" id="nameInput" name="name" value="{{ $category->name }}" class="border p-2 rounded mb-4 w-full">
                    <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('name') }}</p>
                </div>

                <div class="mb-4">
                    <label for="" class="text-gray-600">Descripción</label>
                    <textarea type="text" name="description" rows="8" class="border p-2 rounded w-full resize-none">{{ $category->description }}</textarea>
                    <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('description') }}</p>
                </div>

                <button type="submit" id="theme-toggle" class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition-colors">
                    Actualizar categoria
                </button>
            </form>
        </div>          
    </div>

</x-app-layout>

