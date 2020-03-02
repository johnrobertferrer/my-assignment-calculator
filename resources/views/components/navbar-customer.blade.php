@section('navbar')
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/notebook.svg') }}" width="25px" alt="" class="mr-1">
                <label class="header-1">
                    {{ config('app.name', 'Laravel') }}
                </label>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        <li class="nav-item">
                            <a href="{{ url('export-pdf') }}" class="nav-link">
                                <img src="{{ asset('img/export.svg') }}" width="25px" alt="" class="mr-1">
                                Export PDF
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                <img src="{{ asset('img/login.svg') }}" width="25px" alt="" class="mr-1">
                                {{ __('Login') }}
                            </a>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
@endsection