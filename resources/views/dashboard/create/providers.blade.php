<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Crear Proveedor
        </h2>
    </x-slot>

    <div class="py-9 max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white shadow rounded-lg p-6">
            <h1 class="text-xl font-semibold mb-4 text-gray-900">Información personal del proveedor</h1>
            <p class="text-gray-600 mb-1">Sigue los pasos y complete el siguiente formulario para poder agregar un nuevo proveedor de forma correcta</p>
            <p class="text-gray-600 mb-6">(*) Indica que el campo es obligatorio</p>
            <form method="POST" id="CreateForm" action="{{ route('dashboard.providers.create') }}" enctype="multipart/form-data">
                @csrf
                {{-- Tailwind component of TailwindCss Components --}}

                <div class="w-full max-w-md py-9">
                    <span class="block text-lg mb-2 text-gray-600">Agregar imagen</span>
                    <div class="bg-gray-100 p-8 text-center rounded-lg border-dashed border-2 border-gray-300 hover:border-blue-500 transition duration-300 ease-in-out transform hover:scale-105 hover:shadow-md" id="dropzone">
                        <label for="fileInput" class="cursor-pointer flex flex-col items-center space-y-2">
                            <span class="text-gray-500 text-sm">JPG - PNG - JPEG | max. 500kb</span>
                            <svg class="w-16 h-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            <span class="text-gray-600">Arrastre su imagen aqui</span>
                            <span class="text-gray-500 text-sm">(o puedes hacer click)</span>
                        </label>
                        <input type="file" name="image" id="fileInput" class="hidden" accept="image/png, image/jpeg">
                    </div>
                    <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('image') }}</p>
                    <div class="mt-6 text-center" id="fileList"></div>
                </div>

                {{-- Minified script --}}
                <script>
                    const dropzone=document.getElementById("dropzone"),fileInput=document.getElementById("fileInput"),fileList=document.getElementById("fileList");function handleFiles(e){for(let t of(fileList.innerHTML="",e)){let r=document.createElement("div");r.textContent=`${t.name} (${formatBytes(t.size)})`,fileList.appendChild(r)}}function formatBytes(e){if(0===e)return"0 Bytes";let t=Math.floor(Math.log(e)/Math.log(1024));return parseFloat((e/Math.pow(1024,t)).toFixed(2))+" "+["Bytes","KB","MB","GB","TB"][t]}dropzone.addEventListener("dragover",e=>{e.preventDefault(),dropzone.classList.add("border-blue-500","border-2")}),dropzone.addEventListener("dragleave",()=>{dropzone.classList.remove("border-blue-500","border-2")}),dropzone.addEventListener("drop",e=>{e.preventDefault(),dropzone.classList.remove("border-blue-500","border-2");let t=e.dataTransfer.files;handleFiles(t)}),fileInput.addEventListener("change",e=>{let t=e.target.files;handleFiles(t)});
                </script>

                {{-- ------------------------ --}}

                <div class="mb-4">
                    <label for="nameInput" class="text-gray-600">* Nombre</label>
                    <input type="text" name="name" id="nameInput" class="border p-2 rounded w-full" value="{{ old("name") }}">
                    <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('name') }}</p>
                </div>

                <div class="mb-4">
                    <label for="" class="text-gray-600">Sitio web</label>
                    <input type="text" name="web" class="border p-2 rounded w-full" value="{{ old("web") }}">
                    <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('web') }}</p>
                    <p class="max-w-full mt-1 text-xs font-medium leading-none text-gray-500">Agregar la extensión "http://" o "https://" de la url para evitar errores</p>
                </div>
                
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                    <div>
                        <label for="">Correo electronico</label>
                        <input type="email" name="mail" class="border p-2 rounded w-full" value="{{ old("mail") }}">
                        <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('mail') }}</p>
                    </div>

                    <div>
                        <label class="text-gray-600" for="">Teléfono</label>
                        <input type="text" name="phone" class="border p-2 rounded w-full" value="{{ old("phone") }}">
                        <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('phone') }}</p>
                    </div>
                </div>
                
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
                        <input type="text" name="address" class="border p-2 rounded mb-6 w-full" value="{{ old("address") }}">
                        <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('address') }}</p>
                    </div>
                </div>

                <button type="submit" form="CreateForm" id="theme-toggle" class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition-colors">
                    Crear proveedor
                </button>
            </form>
        </div>          
    </div>

    <script src="{{ asset('js/locations_options.js') }}">
    </script>

</x-app-layout>

