<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <link rel="stylesheet" href="{{ asset('css/estilo_basico.css') }}">
        <title>Super gestão - @yield('titulo')</title>
        <meta charset="utf-8">

    </head>

    <body>
        @include('site.layouts._partials.topo')
        @yield('conteudo')
    </body>
</html>