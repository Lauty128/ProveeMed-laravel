{{-- esto indica que nos vamos a centrar en el archivo layout.blade.php para generar este archivo --}}
@extends('layout')

{{-- Los section son para rellenar el contenido de las etiquetas @yield en el archivo layout.blade.php --}}
@section('title', 'ProveeMed | Equipos')

@section('body')

<div class="DivisorComponent">

    @component('components.equipmentFilters')    
    @endcomponent

    <div class="CardsContainer">
        
        <div class='Card Card--header'>
            <span style="color: rgb(66,66,66); textTransform: uppercase">Nombre</span>
            <span style="color: rgb(66,66,66); textTransform: uppercase">Detalles</span>            
        </div>


        @if ($equipments->count() > 0)
            @foreach ($equipments as $equipment)
                <div class="Card Card--provider">
                    <span class='Card__id'>{{ '#'.$equipment->id }}</span>
                    <h4 class="Card__h4">{{ $equipment->name }}</h4>
                    <a href="{{ route('provider', ['id' => $equipment->id]) }}" class="Card__a">
                        <svg width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#000000"><path d="M12 12H19M19 12L16 15M19 12L16 9" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M19 6V5C19 3.89543 18.1046 3 17 3H7C5.89543 3 5 3.89543 5 5V19C5 20.1046 5.89543 21 7 21H17C18.1046 21 19 20.1046 19 19V18" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                    </a>
                </div>
            @endforeach   
    
            {{-- este sistema tiene una comlejidad mas alta. Renderiza el codigo del archivo indicado --}}
            {{-- el componente recibe una variable $paginator con algunas propiedades interesantes --}}
            {{-- Aca el link: https://laravel.com/docs/10.x/pagination#paginator-instance-methods --}}
            {{ $equipments->links('components.pagination') }}
                
        @else
            <div class="emptyList" style="display: flex; flex-direction:column; align-items:center; gap:1.5em">
                <span style="margin-top: 3em; text-align: center; display:block">No se encontro ningun resultado</span>
                <a href="{{ route('providers') }}">Restablecer</a>
            </div>
        @endif
        
    </div> 
</div>

@endsection
