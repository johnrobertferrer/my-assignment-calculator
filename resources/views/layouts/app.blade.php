<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="title" content="My Assignment Calculator">
    <meta name="description" content="A stand-alone web application calculator that calculates the remaining dates that assignment should be passed.">
    <meta name="keywords" content="My, Assignment, Calculator, My assignment calculator, fiverr, john, john ferrer">
    <meta name="robots" content="index, follow">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="language" content="English">
    <meta name="author" content="John Robert S. Ferrer">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>

    <!-- Fonts -->
    @if (isset($fontType))
        @if ($fontType == "1" || $fontType == "3")
            <style>
                @font-face {
                    font-family: 'CustomFont';
                    src: url('{{ asset("$customFontName.eot") }}'); /* IE9 Compat Modes */
                    src: url('{{ asset("$customFontName.eot?#iefix") }}') format('embedded-opentype'), /* IE6-IE8 */
                        url('{{ asset("$customFontName.woff2") }}') format('woff2'), /* Super Modern Browsers */
                        url('{{ asset("$customFontName.woff") }}') format('woff'), /* Pretty Modern Browsers */
                        url('{{ asset("$customFontName.ttf") }}')  format('truetype'), /* Safari, Android, iOS */
                        url('{{ asset("$customFontName.svg#svgFontName") }}') format('svg'); /* Legacy iOS */
                }
            </style>
        @endif
    @endif
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">

    {{-- Custom Style --}}
    @if (isset($fontType))
        @if ($fontType == "1" || $fontType == "3")
            <style>
                body {
                    font-family: 'CustomFont' !important;
                }
            </style>
        @else
            <style>
                body {
                    font-family: "{{ $fontSafe }}" !important;
                }
            </style>
        @endif
    @endif
</head>
@if (isset($background))
    <body style="background: url( {{ $background }});">
@else
    <body>
@endif
    <div id="app">
        @if (isset($loadingStatus))
            <div style="width: 100vw; height: 100vh;" v-show="!loadingStatus">
                <div class="lds-circle"><div></div></div>
            </div>
        @endif

        <div v-show="loadingStatus">
            @yield('navbar')
        </div>

        <main class="py-4" v-show="loadingStatus">
            @yield('content')
            @yield('modals')
        </main>
    </div>

    @yield('script')
   

</body>
</html>
