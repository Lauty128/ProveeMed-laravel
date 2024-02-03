@extends('layout')

@section('title', 'ProveeMed | Proveedores')

@section('body')

<div class="DivisorComponent">

    @component('components.providerFilters', [
        'categories' => $categories,
        'provinces' => $provinces
    ])@endcomponent

    <div class="CardsContainer">
        
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
