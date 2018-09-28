<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css">

    <!-- Styles -->


    {{--{!! Html::style('css/app.css') !!}--}}
    @yield('style')


</head>
<body id="page-top">
@include('layouts.header')

<div id="wrapper">
    @guest
    @else
        @include('layouts.sidemenu')
    @endguest


        <div id="content-wrapper">
            @yield('content')
        </div>
</div>


{!! Html::script('js/app.js') !!}
{!! Html::script('js/sb-admin.js') !!}
@yield('scripts')
</body>
</html>
