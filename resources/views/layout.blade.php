<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">
    <link rel="shortcut icon" href="/img/icon.png" type="image/png">    
    @yield('head')
    
    <title>
        @yield('title')
    </title>
</head>
<body>
    {{-- Los componentes solo imprimen su contenido --}}
    {{-- Ver carpeta components --}}
    {{-- Pueden recibir parametros pero en estos casos no reciben nada --}}
    @component('components.static.menu') @endcomponent
    
    <main>
        @yield('body')
    </main>

    @component('components.static.footer') @endcomponent
</body>
</html>

{{-- este layout se cargara siempre en todas las paginas  --}}
{{-- Las etiquetas @yield son para agregar contenido dinamico --}}
