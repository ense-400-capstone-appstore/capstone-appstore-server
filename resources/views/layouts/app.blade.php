<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Material Design Lite https://getmdl.io/ -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.indigo-pink.min.css">
        <title>@lang('app.name') - @yield('title')</title>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>

        <!-- Material Design Lite https://getmdl.io/ -->
        <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    </body>
</html>
