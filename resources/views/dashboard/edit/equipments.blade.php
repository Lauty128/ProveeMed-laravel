<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          Εditar un equipo medico
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
  
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                  <div>
                      <label class="block text-gray-600" for="specifications-input">Εspecificaciones</label>
                      <div class="p-2 border border-gray-200 rounded-lg">
                          <input type="file" name="specifications" id="specifications-input" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold">
                      </div>
                      <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('specifications') }}</p>
                  </div>
  
                  <div>
                      <label class="block text-gray-600" for="category-input">Categoria</label>
                      <select name="category_id" id="category-input" class="border p-2 rounded w-full">
                          @foreach ($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                          @endforeach
                      </select>
                      <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('category_id') }}</p>
                  </div>
                </div>
  
                <div class="mb-4">
                  <label for="" class="text-gray-600">Descripción</label>
                  <textarea type="text" name="description" rows="8" class="border p-2 rounded w-full resize-none">{{ old("description") }}</textarea>
                  <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('description') }}</p>
                </div>
                
                <div class="grid grid-cols-1 gap-4 mb-4 md:grid-cols-2">
                    <div>
                        <label for="" class="text-gray-600">UMDNS</label>
                        <input type="text" name="umdns" class="border p-2 rounded w-full" value="{{ old("umdns") }}">
                        <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('umdns') }}</p>
                    </div>
  
                    <div>
                        <label class="text-gray-600" for="">Precio aproximado (USD)</label>
                        <input type="number" name="price" class="border p-2 rounded w-full" value="{{ old("price") }}">
                        <p class="max-w-full mt-1 text-xs font-medium leading-none text-red-500">{{ $errors->first('price') }}</p>
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
  
  