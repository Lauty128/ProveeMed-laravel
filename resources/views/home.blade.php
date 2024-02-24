@extends('layout')

@section('title', 'ProveeMed | Inicio')

@section('body')
    
    <h2>
        Bienvenido a la interfaz de <b>ProveeMed</b>!!
    </h2>

    <p class="Local-p">
    Simplificamos el acceso a información crucial sobre proveedores argentinos y 
    sus equipos médicos. Descubre una amplia gama de dispositivos, encuentra 
    proveedores confiables y mantén tus datos actualizados fácilmente. 
    Nuestra sección de backups te ofrece control total, permitiéndote descargar 
    plantillas, cargar actualizaciones y revisar el historial de cambios. Con nosotros,
    la gestión eficiente de equipos médicos nunca ha sido tan fácil y centralizada. 
    ¡Explora y optimiza tu experiencia ahora!
    </p>

    <p class="Local-p" style=" margin-top:2em">
        Haz {{' '}}
        <a href="{{ route('dashboard') }}">click aquí</a>
        {{' '}}para ingresar en el panel administrativo!
    </p>

    <style>
        .Local-p{
            color: #505050; 
            font-size: 1.15em;
            max-width: 1100px;
        }
    </style>

@endsection