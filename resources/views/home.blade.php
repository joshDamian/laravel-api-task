<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel 8 Starter Template inc vue3 &amp; tailwindcss</title>

        <meta name="description" content="">

        <meta property="og:title" content="">
        <meta property="og:type" content="">
        <meta property="og:url" content="">
        <meta property="og:image" content="">
    
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        
    </head>
    <body class="bg-gray-100 container mx-auto">
        <div id="app">
            <example-component></example-component>
        </div>

        <!-- Javascript -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
