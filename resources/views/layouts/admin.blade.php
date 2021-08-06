<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Addresser - @yield('title')</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <header>
            @include('partials.links')
            <h2>Admin Area</h2>
        </header>
        <section>
            @yield('content')
        </section>
    </body>
</html>
