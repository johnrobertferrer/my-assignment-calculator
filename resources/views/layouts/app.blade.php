<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet">
</head>
@if (isset($background))
    <body style="background: url( {{ $background }});">
@else
    <body>
@endif
    <div id="app">
        {{-- @if (isset($background)) --}}
        {{-- <div v-if="!isLoading">
            <div class="lds-circle"><div></div></div>
        </div>
        @endif
        <div v-show="isLoading">
            @yield('navbar')
            
            <main class="py-4">
                @yield('content')
            </main>
        </div> --}}
        @yield('navbar')
            
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @yield('script')
</body>
</html>