<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Categorias
        </h2>
    </x-slot>

    <div class="py-9">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="w-full mb-4 flex items-center gap-2 flex-wrap">
                <a href="{{ route('dashboard.categories.create--page') }}" class="w-fit flex gap-2 items-center p-3 text-sm bg-blue-600 text-white rounded-lg hover:bg-blue-500">
                  <svg width="17px" height="17px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#FFF" stroke-width="1.5"><path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM12.75 8C12.75 7.58579 12.4142 7.25 12 7.25C11.5858 7.25 11.25 7.58579 11.25 8V11.25H8C7.58579 11.25 7.25 11.5858 7.25 12C7.25 12.4142 7.58579 12.75 8 12.75H11.25V16C11.25 16.4142 11.5858 16.75 12 16.75C12.4142 16.75 12.75 16.4142 12.75 16V12.75H16C16.4142 12.75 16.75 12.4142 16.75 12C16.75 11.5858 16.4142 11.25 16 11.25H12.75V8Z" fill="#FFF"></path></svg>
                  Agregar categoria
                </a>
            </div>

            @if ($categories->count() > 0)
              <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                  <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Nombre</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900" style="float: right;">Opciones</th>
                  </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                  @foreach ($categories as $category)
                  <tr class="hover:bg-gray-50">
                      <th class="px-6 py-4 font-normal text-gray-900">
                        <div class="text-sm">
                          <div class="font-medium text-sm">#{{ $category->id }}</div>
                          <div class="text-gray-800 text-base">{{ $category->name }}</div>
                        </div>
                      </th>
                      
                      <td class="px-6 py-4">
                        <div class="flex justify-end gap-4">
                          <form onSubmit="deleteItem(event)" method="post" action="{{ route('dashboard.categories.delete', ['id' => $category->id]) }}">
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
                          <a x-data="{ tooltip: 'Edite' }" href="{{ route('dashboard.categories.update--page', ['id' => $category->id]) }}">
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

            @else
              <p class="mt-20 text-center">Ningún elemento encontrado. <br> <a class="text-blue-800 underline" href="{{ route('dashboard.categories') }}">Click aquí</a> para reiniciar filtros</p>
            @endif

        </div>
    </div>

    @component('components.sweetAlertComponent')
    @endcomponent
</x-app-layout>