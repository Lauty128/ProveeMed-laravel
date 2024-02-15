@extends('layout')

@section('title', $provider->name)

@section('body')

<section class="Information">
    <a class="Information__goBack" href="{{ route('providers') }}">←  Volver a proveedores</a>
    <div class="Information__header">
        <div class="Information__image">
            <img src="{{ $provider->image ?? asset('/img/not-found.png') }}" alt="">
        </div>
        <div>
            <span style="color: #6e6e6e">#{{ $provider->id }}</span>
            <h1 class="Information__title">{{ $provider->name }}</h1>
            @if ($provider->mail || $provider->web)
                <h3 class="Information__optionsTitle">Opciones</h3>
                <div class="Information__headerOptions">
                    @if ($provider->mail)
                        <a class="Information__option" href="mailto:{{ $provider->mail }}">Enviar mail</a>
                    @endif
                    @if ($provider->web)
                        <a class="Information__option" href="{{ $provider->web }}">Visitar web</a>
                    @endif
                </div>
            @endif
        </div>
    </div>

    <section class="Information__section">
        <article class="Information__sectionItem Information__sectionItem--doble Information__sectionItem--categories">
            <h3 class="Information__sectionItem_title">Tipos de equipos que comercializa</h3>
            <div>
                @forelse($categories as $category)
                    <a class="Information__categoryTag" href="{{route('equipments')}}?category={{$category->id}}">{{ $category->name }}</a>
                @empty
                    <span style="margin:0">No hay productos cargados en el sistema</span>
                @endforelse
            </div>
        </article>

        <article class="Information__sectionItem">
            <h3 class="Information__sectionItem_title">Datos de contacto</h3>
            @if ($provider->phone)
                <span>Telefono: <b>{{ $provider->phone }}</b></span>
            @endif
            @if ($provider->mail)
                <span>Mail: <b>{{ $provider->mail }}</b></span>
            @endif
            @if ($provider->web)
                <a href="{{ $provider->web }}"><b>{{ $provider->web }}</b></a>
            @endif
        </article>

        <article class="Information__sectionItem">
            <h3 class="Information__sectionItem_title">Ubicacion</h3>
            <span>Ubicación: <b>{{ $provider->city }}, {{ $provider->province }}</b></span>
            <span>Dirección: 
                <b>
                    @if($provider->address) 
                        {{ $provider->address }} 
                    @else 
                        Sin especificar
                    @endif
                </b>
            </span>
        </article>

        <article class="Information__listSection">
            <div class="Information__listHeader">
                <h3>Equipos con los que trabaja</h3>
                <span id="Total">Total <b></b></span>
            </div>
            <div id="List" class="Information__listContainer" data-url="{{ route('equipments-of-provider', ['id' => $provider->id]) }}" data-redirect="{{ route('equipments') }}">

            </div>
            <button id="LoadMore" class="Information__loadList">
                <svg width="15px" height="15px" stroke-width="2.5" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" color="#044c84"><path d="M21.8883 13.5C21.1645 18.3113 17.013 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C16.1006 2 19.6248 4.46819 21.1679 8" stroke="#044c84" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path><path d="M17 8H21.4C21.7314 8 22 7.73137 22 7.4V3" stroke="#044c84" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                Cargar mas articulos
            </button>
            <p style="text-align:center; opacity: .7">10 articulos por carga</p>
        </article>

    </section>

</section>

@endsection
