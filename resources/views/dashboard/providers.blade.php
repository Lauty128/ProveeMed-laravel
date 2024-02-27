<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Proveedores
        </h2>
    </x-slot>

    <div class="py-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="w-full mb-4 flex items-center gap-2 flex-wrap">
                <a href="{{ route('dashboard.providers.create--page') }}" class="w-fit flex gap-2 items-center p-3 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-500">
                  <svg width="17px" height="17px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#FFF" stroke-width="1.5"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM12.75 8C12.75 7.58579 12.4142 7.25 12 7.25C11.5858 7.25 11.25 7.58579 11.25 8V11.25H8C7.58579 11.25 7.25 11.5858 7.25 12C7.25 12.4142 7.58579 12.75 8 12.75H11.25V16C11.25 16.4142 11.5858 16.75 12 16.75C12.4142 16.75 12.75 16.4142 12.75 16V12.75H16C16.4142 12.75 16.75 12.4142 16.75 12C16.75 11.5858 16.4142 11.25 16 11.25H12.75V8Z" fill="#FFF"></path></svg>
                  Agregar proveedor
                </a>
                <a href="{{ route('dashboard.providers') }}" class="w-fit flex gap-2 items-center p-3 text-sm bg-gray-300 rounded-lg hover:bg-gray-200">
                  <svg width="17px" height="17px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M21.8883 13.5C21.1645 18.3113 17.013 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C16.1006 2 19.6248 4.46819 21.1679 8" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17 8H21.4C21.7314 8 22 7.73137 22 7.4V3" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                  Restablecer
                </a>
            </div>

            <div>
              <form class="flex w-full mt-5 mb-2 rounded bg-white" action="{{ route('dashboard.providers') }}">
                  <input class=" w-full border-none bg-transparent px-4 py-1 text-gray-600 outline-none focus:outline-none " type="search" name="search" placeholder="Buscar..." @if(isset($queries['search'])) value="{{$queries['search']}}" @endif />
                  <button type="submit" class="m-2 rounded bg-blue-600 px-4 py-2 text-white hover:hover:bg-blue-500">
                      <svg class="fill-current h-5 w-5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                      <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                      </svg>
                  </button>
              </form>
            </div>

            @if ($providers->count() > 0)
              <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nombre</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Estado</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Provincia</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                @foreach ($providers as $provider)
                <tr class="hover:bg-gray-50">
                    <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                      <div class="relative h-10 w-10">
                        <img
                          class="h-full w-full rounded-full object-cover object-center"
                          src="{{ $provider->image ? asset('storage/images/providers/'.$provider->image) : asset('img/not-found.png') }}"
                          alt=""
                        />
                      </div>
                      <div class="text-sm">
                        <div class="font-medium text-sm">#{{ $provider->id }}</div>
                        <div class="text-gray-800 text-base">{{ $provider->name }}</div>
                      </div>
                    </th>
                    <td class="px-6 py-4">
                        @if($provider->available)
                            <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-xs font-semibold text-green-600">
                                <span class="h-1.5 w-1.5 rounded-full bg-green-600"></span>
                                Activo
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 rounded-full bg-red-50 px-2 py-1 text-xs font-semibold text-red-600">
                                <span class="h-1.5 w-1.5 rounded-full bg-red-600"></span>
                                Desactivo
                            </span>
                        @endif
                      
                    </td>
                    <td class="px-6 py-4">{{ $provider->province }}</td>
                    
                    <td class="px-6 py-4">
                      <div class="flex justify-end gap-4">
                        <form onSubmit="deleteItem(event)" method="post" action="{{ route('dashboard.providers.delete', ['id' => $provider->id]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" x-data="{ tooltip: 'Delete' }">
                              <svg
                                xmlns="http://www.w3.org/2000/svg"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke-width="1.5"
                                stroke="currentColor"
                                class="h-6 w-6 stroke-gray-500 hover:stroke-zinc-800"
                                x-tooltip="tooltip"
                              >
                                <path
                                  stroke-linecap="round"
                                  stroke-linejoin="round"
                                  d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"
                                />
                              </svg>
                            </button>
                        </form>
                        <a x-data="{ tooltip: 'Edite' }" href="{{ route('dashboard.providers.update--page', ['id' => $provider->id]) }}">
                          <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="h-6 w-6 stroke-gray-500 hover:stroke-zinc-800"
                            x-tooltip="tooltip"
                          >
                            <path
                              stroke-linecap="round"
                              stroke-linejoin="round"
                              d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125"
                            />
                          </svg>
                        </a>
                      </div>
                    </td>
                  </tr>
                @endforeach
                  
                </tbody>
              </table>

              <br>
              {{ $providers->links('components.pagination-tailwind') }}
            @else
              <p class="mt-20 text-center">Ningún proveedor encontrado. <br> <a class="text-blue-800 underline" href="{{ route('dashboard.providers') }}">Click aquí</a> para reiniciar filtros</p>
            @endif

        </div>
    </div>

    @component('components.sweetAlertComponent')
    @endcomponent
</x-app-layout>