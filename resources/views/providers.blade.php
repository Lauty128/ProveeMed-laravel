@extends('layout')

@section('title', 'ProveeMed | Proveedores')

@section('body')

<div class="DivisorComponent">

    <div class="DivisorComponent__header">
        <span><b>{{ $providers->total() }}</b> Resultados</span>
        <div class="DivisorComponent__order">
            <span>Ordenar por </span>
            <select name="sort" id="sort-input">
                <option value="1">Codigo: menor a mayor</option>
                <option value="2">Codigo: mayor a menor</option>
                <option value="3">Ordenar de A a Z (asc)</option>
                <option value="4">Ordenar de Z a A (desc)</option>
            </select>
        </div>
    </div>

    @component('components.providerFilters', [
        'categories' => $categories,
        'provinces' => $provinces
    ])@endcomponent

    <div class="CardsContainer" data-pagination="{{ route('providers') }}">
        
        <div class='Card Card--header'>
            <span style="color: rgb(66,66,66); textTransform: uppercase">Nombre</span>
            <span style="color: rgb(66,66,66); textTransform: uppercase">Provincia</span>            
        </div>


        @if ($providers->count() > 0)
            @foreach ($providers as $provider)
                <a href="{{ route('provider', ['id' => $provider->id]) }}" class="Card Card--provider">
                    <span class='Card__id'>{{ '#'.$provider->id }}</span>
                    <h4 class="Card__h4">{{ $provider->name }}</h4>
                    <span class="Card__span" title="{{ $provider->province }}">{{ $provider->province }}</span>
                </a>
            @endforeach   
    
            {{ $providers->links('components.pagination') }}
                
        @else
            <div class="emptyList" style="display: flex; flex-direction:column; align-items:center; gap:1.5em">
                <span style="margin-top: 3em; text-align: center; display:block">No se encontro ningun resultado</span>
                <a href="{{ route('providers') }}">Restablecer</a>
            </div>
        @endif
        
    </div> 
</div>

@endsection
