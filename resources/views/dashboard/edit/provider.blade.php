<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Proveedor
        </h2>
    </x-slot>

    <div class="py-9 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900">Información personal del proveedor</h1>
            <p class="text-gray-600 mb-6">Use a permanent address where you can receive mail.</p>
            <form>
                <div>
                    <label for="nameInput" class="text-gray-600">Nombre</label>
                    <input type="text" id="nameInput" value="{{ $provider->name }}" class="border p-2 rounded mb-4 w-full">
                </div>

                <div>
                    <label for="" class="text-gray-600">Sitio web</label>
                    <input type="text" value="{{ $provider->web ?? "" }}" class="border p-2 rounded mb-4 w-full">
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="">Correo electronico</label>
                        <input type="email" value="{{ $provider->mail ?? "" }}" class="border p-2 rounded w-full">
                    </div>

                    <div>
                        <label class="text-gray-600" for="">Telefono</label>
                        <input type="text" value="{{ $provider->phone ?? "" }}" class="border p-2 rounded w-full">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                    <div>
                        <label for="" class="text-gray-600">Provincia</label>
                        <select id="ProvinceOptionTag"  class="border p-2 rounded w-full" data-current="{{$provider->province_id}}">
                            @foreach ($provinces as $key => $province)
                                @if ($key == $provider->province_id)
                                    <option selected value="{{ $key }}">{{$province}}</option>
                                @else
                                    <option value="{{ $key }}">{{$province}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    
                    <div>
                        <label for="" class="text-gray-600">Ciudad</label>
                        <select id="CityOptionTag" class="border p-2 rounded w-full" name="city" data-current="{{$provider->city_id}}">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                        {{-- <input type="text" value="{{ $provider->city ?? "" }}" class="border p-2 rounded w-full"> --}}
                    </div>    
                </div>

                <div>
                    <label for="" class="text-gray-600">Dirección</label>
                    <input type="text" value="{{ $provider->address ?? "" }}" class="border p-2 rounded mb-6 w-full">
                </div>

                <button type="button" id="theme-toggle" class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition-colors">
                    Actualizar proveedor
                </button>
            </form>
        </div>          
    </div>

    <script>
        //------> Components
        const CityOptionTag = document.getElementById('CityOptionTag');
        const ProvinceOptionTag = document.getElementById('ProvinceOptionTag');

        //------> Configs
        const URL_BASE_GEOREF = 'https://apis.datos.gob.ar/georef/api/'
        const currentCityId = CityOptionTag.dataset.current;
        
        function verifyCities(){

        }

        // function change
        
        function load_cities(province_id){
            const fragment = document.createDocumentFragment();
            CityOptionTag.innerHTML = '';

            // fetch(URL_BASE_GEOREF + 'localidades-censales' + '?provincia=' + province_id + '&campos=id,nombre&max=150')
            // .then(res => res.json())
            // .then((result) => {
            //     console.log(result);
            // }).catch((err) => {
            //     console.log('Ocurrio un error');
            // });

            response.localidades_censales.forEach(city => {
                const option = document.createElement('option');

            });

        }

        load_cities(ProvinceOptionTag.dataset.current);
        
    </script>

</x-app-layout>

