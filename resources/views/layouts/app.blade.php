<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Addresser</title>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body>
        <header>
            @include('partials.links')
            <div class="title">
                <h1>Addresser</h1>
            </div>
        </header>
        @yield('contents')

        <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
