@extends('layout')

@section('title', $equipment->name)

@section('body')

<section class="Information">
    <a class="Information__goBack" href="{{ route('equipments') }}">←  Volver a proveedores</a>
    <div class="Information__header">
        <div class="Information__image">
            <img src="{{ $equipment->image ? asset('/storage/images/providers/'.$equipment->image) : asset('/img/not-found.png') }}" alt="">
        </div>
        <div>
            <span style="color: #6e6e6e">#{{ $equipment->id }}</span>
            <h1 class="Information__title">{{ $equipment->name }}</h1>
            
            <h3 class="Information__optionsTitle">Opciones</h3>
            <div class="Information__headerOptions">
                <a class="Information__option" href="#">Descargar especificaciones</a>
            </div>
            
        </div>
    </div>

    <section class="Information__section">

        <article class="Information__sectionItem">
            <h3 class="Information__sectionItem_title">Descripcion</h3>
            <p>{{ $equipment->description ?? 'Sin especificar' }}</p>
        </article>

        <article class="Information__sectionItem">
            <h3 class="Information__sectionItem_title">Informacion</h3>
            <span>Categoria: <a href="{{ route('equipments').'?category='.$equipment->category->id }}">{{ $equipment->category->name }}</a></span>
            <span>Codigo UMDNS: <b>{{ $equipment->umdns ?? 'Sin especificar' }}</b></span>
            <span>Precio aproximado: <b>{{ $equipment->price ? 'USD '.$equipment->price : 'Sin especificar' }}</b></span>
        </article>

        <article class="Information__listSection">
            <div class="Information__listHeader">
                <h3>Equipos con los que trabaja</h3>
                <span id="Total">Total <b></b></span>
            </div>
            <div id="List" class="Information__listContainer" data-url="{{ route('api.providers-of-equipment', ['id' => $equipment->id]) }}" data-redirect="{{ route('providers') }}">

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
