<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Cambiar ubicacion del Proveedor
        </h2>
    </x-slot>

    @if ($errors->any())
    <div class="bg-red-50 border-l-8 border-red-900">
        <div class="flex items-center">
            <div class="p-2">
                <div class="flex items-center">
                    <div class="ml-2">
                        <svg class="h-8 w-8 text-red-900 mr-2 cursor-pointer"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <p class="px-6 py-4 text-red-900 font-semibold text-lg">Revisa los siguientes errores</p>
                </div>
                <div class="px-16 mb-4">
                    @foreach ($errors->all() as $error)
                        <li class="text-md font-bold text-red-500 text-sm">{{ $error }}</li>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif

    <div class="py-9 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900">Información del proveedor</h1>
            <p class="text-gray-600 mb-6">Porfavor indique la nueva ubicacion del proveedor y dale click a <b>Actualizar proveedor</b></p>
            <form method="POST" action="{{ route('dashboard.providers_location.update', ['id'=>$provider->id]) }}">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                    <div>
                        <label for="" class="text-gray-600">* Provincia</label>
                        <select id="ProvinceOptionTag" name="province" class="border p-2 rounded w-full">
                            <option value=""></option>
                            @foreach ($provinces as $key => $province)
                                <option value="{{ $key }}">{{$province}}</option>
                            @endforeach
                        </select>
                        <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('province') }}</p>
                    </div>
                    
                    <div>
                        <label for="" class="text-gray-600">* Departamento</label>
                        <select id="DepartmentOptionTag" name="department" class="border p-2 rounded w-full" name="city">
                            
                        </select>
                        <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('department') }}</p>
                    </div>    
                </div>

                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                    <div>
                        <label for="" class="text-gray-600">* Ciudad</label>
                        <select id="CityOptionTag" name="city" class="border p-2 rounded w-full" name="city">
                            
                        </select>
                        <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('city') }}</p>
                    </div>    

                    <div>
                        <label for="" class="text-gray-600">Dirección</label>
                        <input type="text" name="address" class="border p-2 rounded mb-6 w-full">
                        <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('address') }}</p>
                    </div>
                </div>

                <button type="submit" id="theme-toggle" class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition-colors">
                    Actualizar proveedor
                </button>
            </form>
        </div>          
    </div>

    <script src="{{ asset('js/locations_options.js') }}">
    </script>

</x-app-layout>

