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
            <form method="POST" action="{{ route('dashboard.providers.update') }}">
                @csrf
                @method('PUT')

                {{-- Tailwind component of TailwindCss Components --}}

                <div class="w-full max-w-md py-9">
                    <span class="text-lg mb-7 text-gray-600">Cambiar imagen</span>
                    <div class="bg-gray-100 p-8 text-center rounded-lg border-dashed border-2 border-gray-300 hover:border-blue-500 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-md" id="dropzone">
                        <label for="fileInput" class="cursor-pointer flex flex-col items-center space-y-2">
                            <span class="text-gray-500 text-sm">JPG - PNG - JPEG | max. 500kb</span>
                            <svg class="w-16 h-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span class="text-gray-600">Arrastra su imagen aqui</span>
                            <span class="text-gray-500 text-sm">(o puedes hacer click)</span>
                        </label>
                        <input type="file" id="fileInput" class="hidden">
                    </div>
                    <div class="mt-6 text-center" id="fileList"></div>
                </div>

                {{-- Minified script --}}
                <script>
                    const dropzone=document.getElementById("dropzone"),fileInput=document.getElementById("fileInput"),fileList=document.getElementById("fileList");function handleFiles(e){for(let t of(fileList.innerHTML="",e)){let r=document.createElement("div");r.textContent=`${t.name} (${formatBytes(t.size)})`,fileList.appendChild(r)}}function formatBytes(e){if(0===e)return"0 Bytes";let t=Math.floor(Math.log(e)/Math.log(1024));return parseFloat((e/Math.pow(1024,t)).toFixed(2))+" "+["Bytes","KB","MB","GB","TB"][t]}dropzone.addEventListener("dragover",e=>{e.preventDefault(),dropzone.classList.add("border-blue-500","border-2")}),dropzone.addEventListener("dragleave",()=>{dropzone.classList.remove("border-blue-500","border-2")}),dropzone.addEventListener("drop",e=>{e.preventDefault(),dropzone.classList.remove("border-blue-500","border-2");let t=e.dataTransfer.files;handleFiles(t)}),fileInput.addEventListener("change",e=>{let t=e.target.files;handleFiles(t)});
                </script>

                {{-- ------------------------ --}}

                <div>
                    <label for="nameInput" class="text-gray-600">Nombre</label>
                    <input type="text" id="nameInput" value="{{ $provider->name }}" class="border p-2 rounded mb-4 w-full">
                </div>

                <div>
                    <label for="" class="text-gray-600">Sitio web</label>
                    <input type="text" value="{{ $provider->web ?? "" }}" class="border p-2 rounded mb-4 w-full">
                </div>
                
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                    <div>
                        <label for="">Correo electronico</label>
                        <input type="email" value="{{ $provider->mail ?? "" }}" class="border p-2 rounded w-full">
                    </div>

                    <div>
                        <label class="text-gray-600" for="">Telefono</label>
                        <input type="text" value="{{ $provider->phone ?? "" }}" class="border p-2 rounded w-full">
                    </div>
                </div>
                
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                    <div>
                        <label for="" class="text-gray-600">Provincia</label>
                        <select id="ProvinceOptionTag"  class="border p-2 rounded w-full">
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
                        <p>Si la provincia es ciudad autonoma de buenos aires (02), entonces la ciudad no deberia tener opcion de seleccion y en la base de datos la ciudad deberia ser nula</p>
                        <p>Deberian tener opcion de no marcar una ciudad</p>
                        <label for="" class="text-gray-600">Ciudad</label>
                        <select id="CityOptionTag" class="border p-2 rounded w-full" name="city">
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

