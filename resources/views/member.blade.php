<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include('layouts._head')
        @include('layouts._style')
    </head>
    <body>
        <header>
            @include('layouts._header')
        </header>
        <section>
        </section>
        <footer>
            @include('layouts._footer')
        </footer>
    </body>
</html>

