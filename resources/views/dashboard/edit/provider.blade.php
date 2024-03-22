<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Proveedor
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
            <h1 class="text-xl font-semibold mb-4 text-gray-900">Información personal del proveedor</h1>
            <p class="text-gray-600 mb-1">Siga los pasos para modificar los datos personales del proveedor.</p>
            <p class="text-gray-600 mb-6">Si desea cambiar la imagen solo debe agregarla en la secciond de abajo.</p>
            <form method="POST" action="{{ route('dashboard.providers.update', ['id'=>$provider->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                {{-- Tailwind component of TailwindCss Components --}}

                <div class="max-w-sm py-4">
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
                        <input type="file" name="image" id="fileInput" class="hidden">
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
                    <input type="text" name="name" id="nameInput" value="{{ $provider->name }}" class="border p-2 rounded mb-4 w-full">
                </div>

                <div class="mb-4">
                    <label for="" class="text-gray-600">Sitio web</label>
                    <input type="text" name="web" value="{{ $provider->web ?? '' }}" class="border p-2 rounded w-full">
                    <p class="max-w-full mt-1 text-xs font-medium leading-none text-gray-500">Agregar la extensión "http://" o "https://" de la url para evitar errores</p>    
                </div>
                
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                    <div>
                        <label for="">Correo electronico</label>
                        <input type="email" name="mail" value="{{ $provider->mail ?? '' }}" class="border p-2 rounded w-full">
                    </div>

                    <div>
                        <label class="text-gray-600" for="">Telefono</label>
                        <input type="text" name="phone" value="{{ $provider->phone ?? '' }}" class="border p-2 rounded w-full">
                    </div>
                </div>
                
                <p class="text-gray-700 mb-6">Puedes modificar la ubicación del proveedor dando <a class="underline text-blue-600" href="{{ route('dashboard.providers_location.update--page', ['id'=>$provider->id]) }}">click aquí</a></p>


                <button type="submit" id="theme-toggle" class="px-4 py-2 rounded bg-blue-500 text-white hover:bg-blue-600 focus:outline-none transition-colors">
                    Actualizar proveedor
                </button>
            </form>
        </div>          
    </div>

</x-app-layout>

