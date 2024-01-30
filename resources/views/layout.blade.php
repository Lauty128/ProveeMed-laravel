<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/index.css">    
    @yield('head')
    
    <title>
        @yield('title')
    </title>
</head>
<body>
    @component('components.static.menu') @endcomponent
    
    <main>
        @yield('body')
    </main>

    @component('components.static.footer') @endcomponent
</body>
</html>
