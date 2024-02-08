@extends('layout')

@section('title', 'ProveeMed | Equipos')

@section('body')

<div class="DivisorComponent">

    <div class="DivisorComponent__header">
        <span><b>{{ $equipments->total() }}</b> Resultados</span>
        <div class="DivisorComponent__order">
            <span>Ordenar por </span>
            <select name="sort" id="sort-input">
                <option value="1">Codigo: menor a mayor</option>
                <option value="2">Codigo: mayor a menor</option>
                <option value="3">Ordenar de A a Z (asc)</option>
                <option value="4">Ordenar de Z a A (desc)</option>
                <option value="5">Menor precio (asc)</option>
                <option value="6">Mayor precio (desc)</option>
            </select>
        </div>
    </div>

    @component('components.equipmentFilters', [
        'categories' => $categories
    ])@endcomponent

    <div class="CardsContainer" data-pagination="{{ route('equipments') }}">
        
        <div class='Card Card--header'>
            <span style="color: rgb(66,66,66); textTransform: uppercase">Nombre</span>
            <span style="color: rgb(66,66,66); textTransform: uppercase">Categoria</span>            
        </div>


        @if ($equipments->count() > 0)
            @foreach ($equipments as $equipment)
                <a href="{{ route('equipment', ['id' => $equipment->id]) }}" class="Card">
                    <span class='Card__id'>{{ '#'.$equipment->id }}</span>
                    <h4 class="Card__h4">{{ $equipment->name }}</h4>
                    <span class="Card__span" title="{{$equipment->category->name}}">{{$equipment->category->name}}</span>
                </a>
            @endforeach   
    
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
