@extends('layouts._header')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include('layouts._head')
        @include('layouts._style')
    </head>
    <body>
        @section('header-nav1')
            <section>
            @parent
            @include('layouts._index_carousel')
            @section('header-nav2')
                @parent
            </section>
            <footer>
                @include('layouts._footer')
            </footer>
            @endsection
        @endsection
    </body>
</html>
