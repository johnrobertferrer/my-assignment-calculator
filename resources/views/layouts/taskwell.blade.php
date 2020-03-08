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

    <link rel="stylesheet" href="{{ mix('/css/admin.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('/js/admin.js') }}" defer></script>

</head>

<body>
    <div class="d-xl-flex">
        <nav class="navbar navbar-expand-xl sticky-top">
            <div class="container">
                <img src="{{ asset('img/admin.svg') }}" width="50px" alt="" class="mr-1">
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarSupportedContent" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle Navigation">
                    <svg class="gi gi-menu fs-lg" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3" y="11" width="18" height="2" rx=".95" ry=".95" />
                        <rect x="3" y="16" width="18" height="2" rx=".95" ry=".95" />
                        <rect x="3" y="6" width="18" height="2" rx=".95" ry=".95" />
                    </svg>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Hi, {{ Auth::user()->name }}</a>
                        </li>
                    </ul>

                    <hr class="w-100">
                    
                    <div class="dropdown flex-xl-grow-1 w-100 mb-5">
                        <button class="btn btn-block btn-sm btn-primary" type="button" aria-haspopup="true" aria-expanded="false">
                            {{ __('Logout') }}
                            {{-- div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div> --}}
                        </button>
                    </div>
                </div>
            </div>
        </nav>
        <main class="flex-xl-grow-1">
            <div class="py-5 py-sm-11">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md">
                            <h1 class="mb-3 fs-lg">Grayshift</h1>
                            <p class="mb-5 mb-md-0 lead">The quick brown fox jumps over the lazy dog.</p>
                        </div>
                        <div class="col-md">
                            <div class="mb-3 text-md-right">
                                <a class="avatar avatar-sm bg-primary border rounded-circle" href="#">jd</a>
                                <a class="avatar avatar-sm bg-success border rounded-circle" href="#">jd</a>
                                <a class="avatar avatar-sm bg-info border rounded-circle" href="#">jd</a>
                                <a class="avatar avatar-sm bg-warning border rounded-circle" href="#">jd</a>
                                <a class="avatar avatar-sm bg-danger border rounded-circle" href="#">jd</a>
                                <a class="avatar avatar-sm bg-primary border rounded-circle" href="#">jd</a>
                                <a class="avatar avatar-sm bg-success border rounded-circle" href="#">jd</a>
                                <button class="btn btn-sm btn-circle btn-neutral ml-n3 align-middle border" data-toggle="modal" data-target="#inviteUsers" type="button">
                                    <svg class="gi gi-plus fs-xs" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2z" />
                                    </svg>
                                </button>
                            </div>
                            <div class="progress mb-3" style="height: .5rem;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <p class="d-flex align-items-center">
                                    <svg class="gi gi-checkmark-square mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M20 11.83a1 1 0 0 0-1 1v5.57a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V5.6a.6.6 0 0 1 .6-.6h9.57a1 1 0 1 0 0-2H5.6A2.61 2.61 0 0 0 3 5.6v12.8A2.61 2.61 0 0 0 5.6 21h12.8a2.61 2.61 0 0 0 2.6-2.6v-5.57a1 1 0 0 0-1-1z" />
                                        <path d="M10.72 11a1 1 0 0 0-1.44 1.38l2.22 2.33a1 1 0 0 0 .72.31 1 1 0 0 0 .72-.3l6.78-7a1 1 0 1 0-1.44-1.4l-6.05 6.26z" />
                                    </svg> 4/8
                                </p>
                                <span class="badge d-inline-flex align-items-center px-3 py-2 bg-neutral rounded" style="font-size: var(--font-size);">
                  <svg class="gi gi-clock-outline mr-3 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z"/><path d="M16 11h-3V8a1 1 0 0 0-2 0v4a1 1 0 0 0 1 1h4a1 1 0 0 0 0-2z"/>
                  </svg>
                  Due 8 days
                </span>
                            </div>
                        </div>
                    </div>
                    <ul class="nav nav-tabs nav-justified nav-sm my-5" id="tablist" role="tablist" aria-orientation="horizontal">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#projects" role="tab" aria-controls="projects" aria-selected="true">Projects</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tasks" role="tab" aria-controls="tasks" aria-selected="false">Tasks</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#files" role="tab" aria-controls="files" aria-selected="false">Files</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="projects" role="tabpanel">
                            <div class="d-flex flex-wrap mb-5">
                                <div class="d-flex align-items-center mr-auto mb-5 mb-md-0">
                                    <h2 class="mr-3 fs-sm">Projects</h2>
                                    <button class="btn btn-sm btn-circle btn-neutral" data-toggle="modal" data-target="#newProject" type="button">
                                        <svg class="gi gi-plus fs-xs" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2z" />
                                        </svg>
                                    </button>
                                </div>
                                <form class="w-md-100" style="width: 12.5rem;">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <svg class="gi gi-funnel-outline fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.9 22a1 1 0 0 1-.6-.2l-4-3.05a1 1 0 0 1-.39-.8v-3.27l-4.8-9.22A1 1 0 0 1 5 4h14a1 1 0 0 1 .86.49 1 1 0 0 1 0 1l-5 9.21V21a1 1 0 0 1-.55.9 1 1 0 0 1-.41.1zm-3-4.54l2 1.53v-4.55A1 1 0 0 1 13 14l4.3-8H6.64l4.13 8a1 1 0 0 1 .11.46z" />
                                            </svg>
                                        </div>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </div>
                                </form>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card card-project mb-5">
                                        <div class="card-body">
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div class="mr-auto">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <svg class="gi gi-radio-button-on-fill mr-3 fs-sm text-primary" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" />
                                                            <path d="M12 7a5 5 0 1 0 5 5 5 5 0 0 0-5-5z" />
                                                        </svg>
                                                        <h3 class="lead lh-lg">
                                                            <a href="#">Github</a>
                                                        </h3>
                                                    </div>
                                                    <p>The quick brown fox jumps over the lazy dog.</p>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                        <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="12" cy="12" r="2" />
                                                            <circle cx="12" cy="5" r="2" />
                                                            <circle cx="12" cy="19" r="2" />
                                                        </svg>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button class="dropdown-item" type="button">Action</button>
                                                        <button class="dropdown-item" type="button">Another action</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="d-flex mr-auto">
                                                    <svg class="gi gi-checkmark-square mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20 11.83a1 1 0 0 0-1 1v5.57a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V5.6a.6.6 0 0 1 .6-.6h9.57a1 1 0 1 0 0-2H5.6A2.61 2.61 0 0 0 3 5.6v12.8A2.61 2.61 0 0 0 5.6 21h12.8a2.61 2.61 0 0 0 2.6-2.6v-5.57a1 1 0 0 0-1-1z" />
                                                        <path d="M10.72 11a1 1 0 0 0-1.44 1.38l2.22 2.33a1 1 0 0 0 .72.31 1 1 0 0 0 .72-.3l6.78-7a1 1 0 1 0-1.44-1.4l-6.05 6.26z" />
                                                    </svg>
                                                    <p>4/8</p>
                                                </div>
                                                <div class="d-flex">
                                                    <svg class="gi gi-clock-outline mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" />
                                                        <path d="M16 11h-3V8a1 1 0 0 0-2 0v4a1 1 0 0 0 1 1h4a1 1 0 0 0 0-2z" />
                                                    </svg>
                                                    <p>Due 8 days</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-project mb-5">
                                        <div class="card-body">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div class="mr-auto">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <svg class="gi gi-radio-button-on-fill mr-3 fs-sm text-success" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" />
                                                            <path d="M12 7a5 5 0 1 0 5 5 5 5 0 0 0-5-5z" />
                                                        </svg>
                                                        <h3 class="lead lh-lg">
                                                            <a href="#">Dribbble</a>
                                                        </h3>
                                                    </div>
                                                    <p>The quick brown fox jumps over the lazy dog.</p>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                        <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="12" cy="12" r="2" />
                                                            <circle cx="12" cy="5" r="2" />
                                                            <circle cx="12" cy="19" r="2" />
                                                        </svg>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button class="dropdown-item" type="button">Action</button>
                                                        <button class="dropdown-item" type="button">Another action</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="d-flex mr-auto">
                                                    <svg class="gi gi-checkmark-square mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20 11.83a1 1 0 0 0-1 1v5.57a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V5.6a.6.6 0 0 1 .6-.6h9.57a1 1 0 1 0 0-2H5.6A2.61 2.61 0 0 0 3 5.6v12.8A2.61 2.61 0 0 0 5.6 21h12.8a2.61 2.61 0 0 0 2.6-2.6v-5.57a1 1 0 0 0-1-1z" />
                                                        <path d="M10.72 11a1 1 0 0 0-1.44 1.38l2.22 2.33a1 1 0 0 0 .72.31 1 1 0 0 0 .72-.3l6.78-7a1 1 0 1 0-1.44-1.4l-6.05 6.26z" />
                                                    </svg>
                                                    <p>8/16</p>
                                                </div>
                                                <div class="d-flex">
                                                    <svg class="gi gi-clock-outline mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" />
                                                        <path d="M16 11h-3V8a1 1 0 0 0-2 0v4a1 1 0 0 0 1 1h4a1 1 0 0 0 0-2z" />
                                                    </svg>
                                                    <p>Due 16 days</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-project mb-5">
                                        <div class="card-body">
                                            <div class="progress">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div class="mr-auto">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <svg class="gi gi-radio-button-on-fill mr-3 fs-sm text-info" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" />
                                                            <path d="M12 7a5 5 0 1 0 5 5 5 5 0 0 0-5-5z" />
                                                        </svg>
                                                        <h3 class="lead lh-lg">
                                                            <a href="#">Behance</a>
                                                        </h3>
                                                    </div>
                                                    <p>The quick brown fox jumps over the lazy dog.</p>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                        <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="12" cy="12" r="2" />
                                                            <circle cx="12" cy="5" r="2" />
                                                            <circle cx="12" cy="19" r="2" />
                                                        </svg>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button class="dropdown-item" type="button">Action</button>
                                                        <button class="dropdown-item" type="button">Another action</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="d-flex mr-auto">
                                                    <svg class="gi gi-checkmark-square mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20 11.83a1 1 0 0 0-1 1v5.57a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V5.6a.6.6 0 0 1 .6-.6h9.57a1 1 0 1 0 0-2H5.6A2.61 2.61 0 0 0 3 5.6v12.8A2.61 2.61 0 0 0 5.6 21h12.8a2.61 2.61 0 0 0 2.6-2.6v-5.57a1 1 0 0 0-1-1z" />
                                                        <path d="M10.72 11a1 1 0 0 0-1.44 1.38l2.22 2.33a1 1 0 0 0 .72.31 1 1 0 0 0 .72-.3l6.78-7a1 1 0 1 0-1.44-1.4l-6.05 6.26z" />
                                                    </svg>
                                                    <p>16/24</p>
                                                </div>
                                                <div class="d-flex">
                                                    <svg class="gi gi-clock-outline mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" />
                                                        <path d="M16 11h-3V8a1 1 0 0 0-2 0v4a1 1 0 0 0 1 1h4a1 1 0 0 0 0-2z" />
                                                    </svg>
                                                    <p>Due 24 days</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-project mb-5">
                                        <div class="card-body">
                                            <div class="progress">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div class="mr-auto">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <svg class="gi gi-radio-button-on-fill mr-3 fs-sm text-warning" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" />
                                                            <path d="M12 7a5 5 0 1 0 5 5 5 5 0 0 0-5-5z" />
                                                        </svg>
                                                        <h3 class="lead lh-lg">
                                                            <a href="#">Pinterest</a>
                                                        </h3>
                                                    </div>
                                                    <p>The quick brown fox jumps over the lazy dog.</p>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                        <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="12" cy="12" r="2" />
                                                            <circle cx="12" cy="5" r="2" />
                                                            <circle cx="12" cy="19" r="2" />
                                                        </svg>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button class="dropdown-item" type="button">Action</button>
                                                        <button class="dropdown-item" type="button">Another action</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="d-flex mr-auto">
                                                    <svg class="gi gi-checkmark-square mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20 11.83a1 1 0 0 0-1 1v5.57a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V5.6a.6.6 0 0 1 .6-.6h9.57a1 1 0 1 0 0-2H5.6A2.61 2.61 0 0 0 3 5.6v12.8A2.61 2.61 0 0 0 5.6 21h12.8a2.61 2.61 0 0 0 2.6-2.6v-5.57a1 1 0 0 0-1-1z" />
                                                        <path d="M10.72 11a1 1 0 0 0-1.44 1.38l2.22 2.33a1 1 0 0 0 .72.31 1 1 0 0 0 .72-.3l6.78-7a1 1 0 1 0-1.44-1.4l-6.05 6.26z" />
                                                    </svg>
                                                    <p>24/32</p>
                                                </div>
                                                <div class="d-flex">
                                                    <svg class="gi gi-clock-outline mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" />
                                                        <path d="M16 11h-3V8a1 1 0 0 0-2 0v4a1 1 0 0 0 1 1h4a1 1 0 0 0 0-2z" />
                                                    </svg>
                                                    <p>Due 32 days</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-project mb-5">
                                        <div class="card-body">
                                            <div class="progress">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div class="mr-auto">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <svg class="gi gi-radio-button-on-fill mr-3 fs-sm text-danger" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" />
                                                            <path d="M12 7a5 5 0 1 0 5 5 5 5 0 0 0-5-5z" />
                                                        </svg>
                                                        <h3 class="lead lh-lg">
                                                            <a href="#">Tumblr</a>
                                                        </h3>
                                                    </div>
                                                    <p>The quick brown fox jumps over the lazy dog.</p>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                        <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="12" cy="12" r="2" />
                                                            <circle cx="12" cy="5" r="2" />
                                                            <circle cx="12" cy="19" r="2" />
                                                        </svg>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button class="dropdown-item" type="button">Action</button>
                                                        <button class="dropdown-item" type="button">Another action</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="d-flex mr-auto">
                                                    <svg class="gi gi-checkmark-square mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20 11.83a1 1 0 0 0-1 1v5.57a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V5.6a.6.6 0 0 1 .6-.6h9.57a1 1 0 1 0 0-2H5.6A2.61 2.61 0 0 0 3 5.6v12.8A2.61 2.61 0 0 0 5.6 21h12.8a2.61 2.61 0 0 0 2.6-2.6v-5.57a1 1 0 0 0-1-1z" />
                                                        <path d="M10.72 11a1 1 0 0 0-1.44 1.38l2.22 2.33a1 1 0 0 0 .72.31 1 1 0 0 0 .72-.3l6.78-7a1 1 0 1 0-1.44-1.4l-6.05 6.26z" />
                                                    </svg>
                                                    <p>32/40</p>
                                                </div>
                                                <div class="d-flex">
                                                    <svg class="gi gi-clock-outline mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" />
                                                        <path d="M16 11h-3V8a1 1 0 0 0-2 0v4a1 1 0 0 0 1 1h4a1 1 0 0 0 0-2z" />
                                                    </svg>
                                                    <p>Due 40 days</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-project mb-5">
                                        <div class="card-body">
                                            <div class="progress">
                                                <div class="progress-bar bg-primary" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div class="mr-auto">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <svg class="gi gi-radio-button-on-fill mr-3 fs-sm text-primary" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" />
                                                            <path d="M12 7a5 5 0 1 0 5 5 5 5 0 0 0-5-5z" />
                                                        </svg>
                                                        <h3 class="lead lh-lg">
                                                            <a href="#">Flickr</a>
                                                        </h3>
                                                    </div>
                                                    <p>The quick brown fox jumps over the lazy dog.</p>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                        <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="12" cy="12" r="2" />
                                                            <circle cx="12" cy="5" r="2" />
                                                            <circle cx="12" cy="19" r="2" />
                                                        </svg>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button class="dropdown-item" type="button">Action</button>
                                                        <button class="dropdown-item" type="button">Another action</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="d-flex mr-auto">
                                                    <svg class="gi gi-checkmark-square mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20 11.83a1 1 0 0 0-1 1v5.57a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V5.6a.6.6 0 0 1 .6-.6h9.57a1 1 0 1 0 0-2H5.6A2.61 2.61 0 0 0 3 5.6v12.8A2.61 2.61 0 0 0 5.6 21h12.8a2.61 2.61 0 0 0 2.6-2.6v-5.57a1 1 0 0 0-1-1z" />
                                                        <path d="M10.72 11a1 1 0 0 0-1.44 1.38l2.22 2.33a1 1 0 0 0 .72.31 1 1 0 0 0 .72-.3l6.78-7a1 1 0 1 0-1.44-1.4l-6.05 6.26z" />
                                                    </svg>
                                                    <p>40/48</p>
                                                </div>
                                                <div class="d-flex">
                                                    <svg class="gi gi-clock-outline mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" />
                                                        <path d="M16 11h-3V8a1 1 0 0 0-2 0v4a1 1 0 0 0 1 1h4a1 1 0 0 0 0-2z" />
                                                    </svg>
                                                    <p>Due 48 days</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-project mb-5 mb-md-0">
                                        <div class="card-body">
                                            <div class="progress">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div class="mr-auto">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <svg class="gi gi-radio-button-on-fill mr-3 fs-sm text-success" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" />
                                                            <path d="M12 7a5 5 0 1 0 5 5 5 5 0 0 0-5-5z" />
                                                        </svg>
                                                        <h3 class="lead lh-lg">
                                                            <a href="#">Quora</a>
                                                        </h3>
                                                    </div>
                                                    <p>The quick brown fox jumps over the lazy dog.</p>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                        <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="12" cy="12" r="2" />
                                                            <circle cx="12" cy="5" r="2" />
                                                            <circle cx="12" cy="19" r="2" />
                                                        </svg>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button class="dropdown-item" type="button">Action</button>
                                                        <button class="dropdown-item" type="button">Another action</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="d-flex mr-auto">
                                                    <svg class="gi gi-checkmark-square mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20 11.83a1 1 0 0 0-1 1v5.57a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V5.6a.6.6 0 0 1 .6-.6h9.57a1 1 0 1 0 0-2H5.6A2.61 2.61 0 0 0 3 5.6v12.8A2.61 2.61 0 0 0 5.6 21h12.8a2.61 2.61 0 0 0 2.6-2.6v-5.57a1 1 0 0 0-1-1z" />
                                                        <path d="M10.72 11a1 1 0 0 0-1.44 1.38l2.22 2.33a1 1 0 0 0 .72.31 1 1 0 0 0 .72-.3l6.78-7a1 1 0 1 0-1.44-1.4l-6.05 6.26z" />
                                                    </svg>
                                                    <p>48/56</p>
                                                </div>
                                                <div class="d-flex">
                                                    <svg class="gi gi-clock-outline mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" />
                                                        <path d="M16 11h-3V8a1 1 0 0 0-2 0v4a1 1 0 0 0 1 1h4a1 1 0 0 0 0-2z" />
                                                    </svg>
                                                    <p>Due 56 days</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="card card-project">
                                        <div class="card-body">
                                            <div class="progress">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <div class="d-flex mb-4">
                                                <div class="mr-auto">
                                                    <div class="d-flex align-items-center mb-3">
                                                        <svg class="gi gi-radio-button-on-fill mr-3 fs-sm text-info" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" />
                                                            <path d="M12 7a5 5 0 1 0 5 5 5 5 0 0 0-5-5z" />
                                                        </svg>
                                                        <h3 class="lead lh-lg">
                                                            <a href="#">Reddit</a>
                                                        </h3>
                                                    </div>
                                                    <p>The quick brown fox jumps over the lazy dog.</p>
                                                </div>
                                                <div class="dropdown">
                                                    <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                        <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                            <circle cx="12" cy="12" r="2" />
                                                            <circle cx="12" cy="5" r="2" />
                                                            <circle cx="12" cy="19" r="2" />
                                                        </svg>
                                                        <span class="sr-only">Toggle Dropdown</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <button class="dropdown-item" type="button">Action</button>
                                                        <button class="dropdown-item" type="button">Another action</button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div class="d-flex mr-auto">
                                                    <svg class="gi gi-checkmark-square mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M20 11.83a1 1 0 0 0-1 1v5.57a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V5.6a.6.6 0 0 1 .6-.6h9.57a1 1 0 1 0 0-2H5.6A2.61 2.61 0 0 0 3 5.6v12.8A2.61 2.61 0 0 0 5.6 21h12.8a2.61 2.61 0 0 0 2.6-2.6v-5.57a1 1 0 0 0-1-1z" />
                                                        <path d="M10.72 11a1 1 0 0 0-1.44 1.38l2.22 2.33a1 1 0 0 0 .72.31 1 1 0 0 0 .72-.3l6.78-7a1 1 0 1 0-1.44-1.4l-6.05 6.26z" />
                                                    </svg>
                                                    <p>56/64</p>
                                                </div>
                                                <div class="d-flex">
                                                    <svg class="gi gi-clock-outline mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M12 2a10 10 0 1 0 10 10A10 10 0 0 0 12 2zm0 18a8 8 0 1 1 8-8 8 8 0 0 1-8 8z" />
                                                        <path d="M16 11h-3V8a1 1 0 0 0-2 0v4a1 1 0 0 0 1 1h4a1 1 0 0 0 0-2z" />
                                                    </svg>
                                                    <p>Unscheduled</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tasks" role="tabpanel">
                            <div class="d-flex flex-wrap mb-5">
                                <div class="d-flex align-items-center mr-auto mb-5 mb-md-0">
                                    <h2 class="mr-3 fs-sm">Tasks</h2>
                                    <button class="btn btn-sm btn-circle btn-neutral" type="button">
                                        <svg class="gi gi-plus fs-xs" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2z" />
                                        </svg>
                                    </button>
                                </div>
                                <form class="w-md-100" style="width: 12.5rem;">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <svg class="gi gi-funnel-outline fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.9 22a1 1 0 0 1-.6-.2l-4-3.05a1 1 0 0 1-.39-.8v-3.27l-4.8-9.22A1 1 0 0 1 5 4h14a1 1 0 0 1 .86.49 1 1 0 0 1 0 1l-5 9.21V21a1 1 0 0 1-.55.9 1 1 0 0 1-.41.1zm-3-4.54l2 1.53v-4.55A1 1 0 0 1 13 14l4.3-8H6.64l4.13 8a1 1 0 0 1 .11.46z" />
                                            </svg>
                                        </div>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </div>
                                </form>
                            </div>
                            <div class="card-group mb-5">
                                <div class="d-flex align-items-center mb-5">
                                    <h3 class="mr-auto lead">Evaluation</h3>
                                    <div class="dropdown">
                                        <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                            <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="12" r="2" />
                                                <circle cx="12" cy="5" r="2" />
                                                <circle cx="12" cy="19" r="2" />
                                            </svg>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-task mb-3">
                                    <div class="card-body d-md-flex align-items-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="mr-5 mb-3 mb-md-0">
                                            <h4 class="fs-xxs lh-lg">
                                                <a href="#">Client objective meeting</a>
                                            </h4>
                                            <p>Today</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between ml-auto">
                                            <div class="d-inline-flex">
                                                <a class="avatar avatar-sm bg-primary border rounded-circle" href="#">jd</a>
                                                <a class="avatar avatar-sm bg-success border rounded-circle" href="#">jd</a>
                                                <a class="avatar avatar-sm d-none d-sm-inline-flex mr-5 bg-info border rounded-circle" href="#">jd</a>
                                            </div>
                                            <div class="d-flex mr-md-5">
                                                <svg class="gi gi-checkmark-square mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 11.83a1 1 0 0 0-1 1v5.57a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V5.6a.6.6 0 0 1 .6-.6h9.57a1 1 0 1 0 0-2H5.6A2.61 2.61 0 0 0 3 5.6v12.8A2.61 2.61 0 0 0 5.6 21h12.8a2.61 2.61 0 0 0 2.6-2.6v-5.57a1 1 0 0 0-1-1z" />
                                                    <path d="M10.72 11a1 1 0 0 0-1.44 1.38l2.22 2.33a1 1 0 0 0 .72.31 1 1 0 0 0 .72-.3l6.78-7a1 1 0 1 0-1.44-1.4l-6.05 6.26z" />
                                                </svg>
                                                <p>4/8</p>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="12" cy="12" r="2" />
                                                    <circle cx="12" cy="5" r="2" />
                                                    <circle cx="12" cy="19" r="2" />
                                                </svg>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <button class="dropdown-item" type="button">Action</button>
                                                <button class="dropdown-item" type="button">Another action</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-task mb-3">
                                    <div class="card-body d-md-flex align-items-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="mr-5 mb-3 mb-md-0">
                                            <h4 class="fs-xxs lh-lg">
                                                <a href="#">Compliance mapping reports</a>
                                            </h4>
                                            <p>4 days</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between ml-auto">
                                            <div class="d-inline-flex">
                                                <a class="avatar avatar-sm bg-warning border rounded-circle" href="#">jd</a>
                                                <a class="avatar avatar-sm d-none d-sm-inline-flex mr-5 bg-danger border rounded-circle" href="#">jd</a>
                                            </div>
                                            <div class="d-flex mr-md-5">
                                                <svg class="gi gi-checkmark-square mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 11.83a1 1 0 0 0-1 1v5.57a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V5.6a.6.6 0 0 1 .6-.6h9.57a1 1 0 1 0 0-2H5.6A2.61 2.61 0 0 0 3 5.6v12.8A2.61 2.61 0 0 0 5.6 21h12.8a2.61 2.61 0 0 0 2.6-2.6v-5.57a1 1 0 0 0-1-1z" />
                                                    <path d="M10.72 11a1 1 0 0 0-1.44 1.38l2.22 2.33a1 1 0 0 0 .72.31 1 1 0 0 0 .72-.3l6.78-7a1 1 0 1 0-1.44-1.4l-6.05 6.26z" />
                                                </svg>
                                                <p>8/16</p>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="12" cy="12" r="2" />
                                                    <circle cx="12" cy="5" r="2" />
                                                    <circle cx="12" cy="19" r="2" />
                                                </svg>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <button class="dropdown-item" type="button">Action</button>
                                                <button class="dropdown-item" type="button">Another action</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-task">
                                    <div class="card-body d-md-flex align-items-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="mr-5 mb-3 mb-md-0">
                                            <h4 class="fs-xxs lh-lg">
                                                <a href="#">Collaborative outcomes reporting</a>
                                            </h4>
                                            <p>8 days</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between ml-auto">
                                            <div class="d-inline-flex">
                                                <a class="avatar avatar-sm bg-primary border rounded-circle" href="#">jd</a>
                                                <a class="avatar avatar-sm d-none d-sm-inline-flex mr-5 bg-success border rounded-circle" href="#">jd</a>
                                            </div>
                                            <div class="d-flex mr-md-5">
                                                <svg class="gi gi-checkmark-square mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 11.83a1 1 0 0 0-1 1v5.57a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V5.6a.6.6 0 0 1 .6-.6h9.57a1 1 0 1 0 0-2H5.6A2.61 2.61 0 0 0 3 5.6v12.8A2.61 2.61 0 0 0 5.6 21h12.8a2.61 2.61 0 0 0 2.6-2.6v-5.57a1 1 0 0 0-1-1z" />
                                                    <path d="M10.72 11a1 1 0 0 0-1.44 1.38l2.22 2.33a1 1 0 0 0 .72.31 1 1 0 0 0 .72-.3l6.78-7a1 1 0 1 0-1.44-1.4l-6.05 6.26z" />
                                                </svg>
                                                <p>16/24</p>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="12" cy="12" r="2" />
                                                    <circle cx="12" cy="5" r="2" />
                                                    <circle cx="12" cy="19" r="2" />
                                                </svg>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <button class="dropdown-item" type="button">Action</button>
                                                <button class="dropdown-item" type="button">Another action</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-group mb-5">
                                <div class="d-flex align-items-center mb-5">
                                    <h3 class="mr-auto lead">Ideation</h3>
                                    <div class="dropdown">
                                        <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                            <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="12" r="2" />
                                                <circle cx="12" cy="5" r="2" />
                                                <circle cx="12" cy="19" r="2" />
                                            </svg>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-task mb-3">
                                    <div class="card-body d-md-flex align-items-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="mr-5 mb-3 mb-md-0">
                                            <h4 class="fs-xxs lh-lg">
                                                <a href="#">Create brand moodboards</a>
                                            </h4>
                                            <p>16 days</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between ml-auto">
                                            <div class="d-inline-flex">
                                                <a class="avatar avatar-sm bg-info border rounded-circle" href="#">jd</a>
                                                <a class="avatar avatar-sm d-none d-sm-inline-flex mr-5 bg-warning border rounded-circle" href="#">jd</a>
                                            </div>
                                            <div class="d-flex mr-md-5">
                                                <svg class="gi gi-checkmark-square mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 11.83a1 1 0 0 0-1 1v5.57a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V5.6a.6.6 0 0 1 .6-.6h9.57a1 1 0 1 0 0-2H5.6A2.61 2.61 0 0 0 3 5.6v12.8A2.61 2.61 0 0 0 5.6 21h12.8a2.61 2.61 0 0 0 2.6-2.6v-5.57a1 1 0 0 0-1-1z" />
                                                    <path d="M10.72 11a1 1 0 0 0-1.44 1.38l2.22 2.33a1 1 0 0 0 .72.31 1 1 0 0 0 .72-.3l6.78-7a1 1 0 1 0-1.44-1.4l-6.05 6.26z" />
                                                </svg>
                                                <p>24/32</p>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="12" cy="12" r="2" />
                                                    <circle cx="12" cy="5" r="2" />
                                                    <circle cx="12" cy="19" r="2" />
                                                </svg>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <button class="dropdown-item" type="button">Action</button>
                                                <button class="dropdown-item" type="button">Another action</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-task mb-3">
                                    <div class="card-body d-md-flex align-items-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="mr-5 mb-3 mb-md-0">
                                            <h4 class="fs-xxs lh-lg">
                                                <a href="#">Concept mapping guide</a>
                                            </h4>
                                            <p>24 days</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between ml-auto">
                                            <div class="d-inline-flex">
                                                <a class="avatar avatar-sm bg-danger border rounded-circle" href="#">jd</a>
                                                <a class="avatar avatar-sm d-none d-sm-inline-flex mr-5 bg-primary border rounded-circle" href="#">jd</a>
                                            </div>
                                            <div class="d-flex mr-md-5">
                                                <svg class="gi gi-checkmark-square mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 11.83a1 1 0 0 0-1 1v5.57a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V5.6a.6.6 0 0 1 .6-.6h9.57a1 1 0 1 0 0-2H5.6A2.61 2.61 0 0 0 3 5.6v12.8A2.61 2.61 0 0 0 5.6 21h12.8a2.61 2.61 0 0 0 2.6-2.6v-5.57a1 1 0 0 0-1-1z" />
                                                    <path d="M10.72 11a1 1 0 0 0-1.44 1.38l2.22 2.33a1 1 0 0 0 .72.31 1 1 0 0 0 .72-.3l6.78-7a1 1 0 1 0-1.44-1.4l-6.05 6.26z" />
                                                </svg>
                                                <p>32/40</p>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="12" cy="12" r="2" />
                                                    <circle cx="12" cy="5" r="2" />
                                                    <circle cx="12" cy="19" r="2" />
                                                </svg>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <button class="dropdown-item" type="button">Action</button>
                                                <button class="dropdown-item" type="button">Another action</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-task">
                                    <div class="card-body d-md-flex align-items-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="mr-5 mb-3 mb-md-0">
                                            <h4 class="fs-xxs lh-lg">
                                                <a href="#">Present concepts and strategies</a>
                                            </h4>
                                            <p>32 days</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between ml-auto">
                                            <div class="d-inline-flex">
                                                <a class="avatar avatar-sm bg-success border rounded-circle" href="#">jd</a>
                                                <a class="avatar avatar-sm d-none d-sm-inline-flex bg-info border rounded-circle" href="#">jd</a>
                                                <a class="avatar avatar-sm d-none d-sm-inline-flex mr-5 bg-warning border rounded-circle" href="#">jd</a>
                                            </div>
                                            <div class="d-flex mr-md-5">
                                                <svg class="gi gi-checkmark-square mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 11.83a1 1 0 0 0-1 1v5.57a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V5.6a.6.6 0 0 1 .6-.6h9.57a1 1 0 1 0 0-2H5.6A2.61 2.61 0 0 0 3 5.6v12.8A2.61 2.61 0 0 0 5.6 21h12.8a2.61 2.61 0 0 0 2.6-2.6v-5.57a1 1 0 0 0-1-1z" />
                                                    <path d="M10.72 11a1 1 0 0 0-1.44 1.38l2.22 2.33a1 1 0 0 0 .72.31 1 1 0 0 0 .72-.3l6.78-7a1 1 0 1 0-1.44-1.4l-6.05 6.26z" />
                                                </svg>
                                                <p>40/48</p>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="12" cy="12" r="2" />
                                                    <circle cx="12" cy="5" r="2" />
                                                    <circle cx="12" cy="19" r="2" />
                                                </svg>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <button class="dropdown-item" type="button">Action</button>
                                                <button class="dropdown-item" type="button">Another action</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-group">
                                <div class="d-flex align-items-center mb-5">
                                    <h3 class="mr-auto lead">Design</h3>
                                    <div class="dropdown">
                                        <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                            <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="12" r="2" />
                                                <circle cx="12" cy="5" r="2" />
                                                <circle cx="12" cy="19" r="2" />
                                            </svg>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-task">
                                    <div class="card-body d-md-flex align-items-center">
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <div class="mr-5 mb-3 mb-md-0">
                                            <h4 class="fs-xxs lh-lg">
                                                <a href="#">Produce realised brand package</a>
                                            </h4>
                                            <p>Unscheduled</p>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between ml-auto">
                                            <div class="d-inline-flex">
                                                <a class="avatar avatar-sm bg-danger border rounded-circle" href="#">jd</a>
                                                <a class="avatar avatar-sm d-none d-sm-inline-flex bg-primary border rounded-circle" href="#">jd</a>
                                                <a class="avatar avatar-sm d-none d-sm-inline-flex mr-5 bg-success border rounded-circle" href="#">jd</a>
                                            </div>
                                            <div class="d-flex mr-md-5">
                                                <svg class="gi gi-checkmark-square mr-2 fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M20 11.83a1 1 0 0 0-1 1v5.57a.6.6 0 0 1-.6.6H5.6a.6.6 0 0 1-.6-.6V5.6a.6.6 0 0 1 .6-.6h9.57a1 1 0 1 0 0-2H5.6A2.61 2.61 0 0 0 3 5.6v12.8A2.61 2.61 0 0 0 5.6 21h12.8a2.61 2.61 0 0 0 2.6-2.6v-5.57a1 1 0 0 0-1-1z" />
                                                    <path d="M10.72 11a1 1 0 0 0-1.44 1.38l2.22 2.33a1 1 0 0 0 .72.31 1 1 0 0 0 .72-.3l6.78-7a1 1 0 1 0-1.44-1.4l-6.05 6.26z" />
                                                </svg>
                                                <p>n/a</p>
                                            </div>
                                        </div>
                                        <div class="dropdown">
                                            <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                                <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                    <circle cx="12" cy="12" r="2" />
                                                    <circle cx="12" cy="5" r="2" />
                                                    <circle cx="12" cy="19" r="2" />
                                                </svg>
                                                <span class="sr-only">Toggle Dropdown</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <button class="dropdown-item" type="button">Action</button>
                                                <button class="dropdown-item" type="button">Another action</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="files" role="tabpanel">
                            <div class="d-flex flex-wrap mb-5">
                                <div class="d-flex align-items-center mr-auto mb-5 mb-md-0">
                                    <h2 class="mr-3 fs-sm">Files</h2>
                                    <button class="btn btn-sm btn-circle btn-neutral" type="button">
                                        <svg class="gi gi-plus fs-xs" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M19 11h-6V5a1 1 0 0 0-2 0v6H5a1 1 0 0 0 0 2h6v6a1 1 0 0 0 2 0v-6h6a1 1 0 0 0 0-2z" />
                                        </svg>
                                    </button>
                                </div>
                                <form class="w-md-100" style="width: 12.5rem;">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <svg class="gi gi-funnel-outline fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M13.9 22a1 1 0 0 1-.6-.2l-4-3.05a1 1 0 0 1-.39-.8v-3.27l-4.8-9.22A1 1 0 0 1 5 4h14a1 1 0 0 1 .86.49 1 1 0 0 1 0 1l-5 9.21V21a1 1 0 0 1-.55.9 1 1 0 0 1-.41.1zm-3-4.54l2 1.53v-4.55A1 1 0 0 1 13 14l4.3-8H6.64l4.13 8a1 1 0 0 1 .11.46z" />
                                            </svg>
                                        </div>
                                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    </div>
                                </form>
                            </div>
                            <label class="w-100">
                                <input class="d-none" type="file">
                                <span class="dropzone">Select or drag & drop your files for upload</span>
                            </label>
                            <div class="card mb-3">
                                <div class="card-body d-flex align-items-center">
                                    <span class="icon bg-neutral border rounded-circle">
                    <svg class="gi gi-file-text-fill fs-xs" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19.74 7.33l-4.44-5a1 1 0 0 0-.74-.33h-8A2.53 2.53 0 0 0 4 4.5v15A2.53 2.53 0 0 0 6.56 22h10.88A2.53 2.53 0 0 0 20 19.5V8a1 1 0 0 0-.26-.67zM9 12h3a1 1 0 0 1 0 2H9a1 1 0 0 1 0-2zm6 6H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zm-.29-10a.79.79 0 0 1-.71-.85V4l3.74 4z"/>
                    </svg>
                  </span>
                                    <span class="avatar avatar-sm bg-primary mr-3 ml-n3 border rounded-circle">jd</span>
                                    <div class="mr-auto">
                                        <h3 class="mb-2 fs-xxs lh-sm">
                                            <a href="#">file.txt</a>
                                        </h3>
                                        <p class="lh-sm">8kb</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                            <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="12" r="2" />
                                                <circle cx="12" cy="5" r="2" />
                                                <circle cx="12" cy="19" r="2" />
                                            </svg>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body d-flex align-items-center">
                                    <span class="icon bg-neutral border rounded-circle">
                    <svg class="gi gi-file-text-fill fs-xs" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19.74 7.33l-4.44-5a1 1 0 0 0-.74-.33h-8A2.53 2.53 0 0 0 4 4.5v15A2.53 2.53 0 0 0 6.56 22h10.88A2.53 2.53 0 0 0 20 19.5V8a1 1 0 0 0-.26-.67zM9 12h3a1 1 0 0 1 0 2H9a1 1 0 0 1 0-2zm6 6H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zm-.29-10a.79.79 0 0 1-.71-.85V4l3.74 4z"/>
                    </svg>
                  </span>
                                    <span class="avatar avatar-sm bg-success mr-3 ml-n3 border rounded-circle">jd</span>
                                    <div class="mr-auto">
                                        <h3 class="mb-2 fs-xxs lh-sm">
                                            <a href="#">file.txt</a>
                                        </h3>
                                        <p class="lh-sm">16kb</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                            <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="12" r="2" />
                                                <circle cx="12" cy="5" r="2" />
                                                <circle cx="12" cy="19" r="2" />
                                            </svg>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body d-flex align-items-center">
                                    <span class="icon bg-neutral border rounded-circle">
                    <svg class="gi gi-file-text-fill fs-xs" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19.74 7.33l-4.44-5a1 1 0 0 0-.74-.33h-8A2.53 2.53 0 0 0 4 4.5v15A2.53 2.53 0 0 0 6.56 22h10.88A2.53 2.53 0 0 0 20 19.5V8a1 1 0 0 0-.26-.67zM9 12h3a1 1 0 0 1 0 2H9a1 1 0 0 1 0-2zm6 6H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zm-.29-10a.79.79 0 0 1-.71-.85V4l3.74 4z"/>
                    </svg>
                  </span>
                                    <span class="avatar avatar-sm bg-info mr-3 ml-n3 border rounded-circle">jd</span>
                                    <div class="mr-auto">
                                        <h3 class="mb-2 fs-xxs lh-sm">
                                            <a href="#">file.txt</a>
                                        </h3>
                                        <p class="lh-sm">24kb</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                            <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="12" r="2" />
                                                <circle cx="12" cy="5" r="2" />
                                                <circle cx="12" cy="19" r="2" />
                                            </svg>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body d-flex align-items-center">
                                    <span class="icon bg-neutral border rounded-circle">
                    <svg class="gi gi-file-text-fill fs-xs" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19.74 7.33l-4.44-5a1 1 0 0 0-.74-.33h-8A2.53 2.53 0 0 0 4 4.5v15A2.53 2.53 0 0 0 6.56 22h10.88A2.53 2.53 0 0 0 20 19.5V8a1 1 0 0 0-.26-.67zM9 12h3a1 1 0 0 1 0 2H9a1 1 0 0 1 0-2zm6 6H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zm-.29-10a.79.79 0 0 1-.71-.85V4l3.74 4z"/>
                    </svg>
                  </span>
                                    <span class="avatar avatar-sm bg-warning mr-3 ml-n3 border rounded-circle">jd</span>
                                    <div class="mr-auto">
                                        <h3 class="mb-2 fs-xxs lh-sm">
                                            <a href="#">file.txt</a>
                                        </h3>
                                        <p class="lh-sm">32kb</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                            <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="12" r="2" />
                                                <circle cx="12" cy="5" r="2" />
                                                <circle cx="12" cy="19" r="2" />
                                            </svg>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body d-flex align-items-center">
                                    <span class="icon bg-neutral border rounded-circle">
                    <svg class="gi gi-file-text-fill fs-xs" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19.74 7.33l-4.44-5a1 1 0 0 0-.74-.33h-8A2.53 2.53 0 0 0 4 4.5v15A2.53 2.53 0 0 0 6.56 22h10.88A2.53 2.53 0 0 0 20 19.5V8a1 1 0 0 0-.26-.67zM9 12h3a1 1 0 0 1 0 2H9a1 1 0 0 1 0-2zm6 6H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zm-.29-10a.79.79 0 0 1-.71-.85V4l3.74 4z"/>
                    </svg>
                  </span>
                                    <span class="avatar avatar-sm bg-danger mr-3 ml-n3 border rounded-circle">jd</span>
                                    <div class="mr-auto">
                                        <h3 class="mb-2 fs-xxs lh-sm">
                                            <a href="#">file.txt</a>
                                        </h3>
                                        <p class="lh-sm">40kb</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                            <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="12" r="2" />
                                                <circle cx="12" cy="5" r="2" />
                                                <circle cx="12" cy="19" r="2" />
                                            </svg>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body d-flex align-items-center">
                                    <span class="icon bg-neutral border rounded-circle">
                    <svg class="gi gi-file-text-fill fs-xs" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19.74 7.33l-4.44-5a1 1 0 0 0-.74-.33h-8A2.53 2.53 0 0 0 4 4.5v15A2.53 2.53 0 0 0 6.56 22h10.88A2.53 2.53 0 0 0 20 19.5V8a1 1 0 0 0-.26-.67zM9 12h3a1 1 0 0 1 0 2H9a1 1 0 0 1 0-2zm6 6H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zm-.29-10a.79.79 0 0 1-.71-.85V4l3.74 4z"/>
                    </svg>
                  </span>
                                    <span class="avatar avatar-sm bg-primary mr-3 ml-n3 border rounded-circle">jd</span>
                                    <div class="mr-auto">
                                        <h3 class="mb-2 fs-xxs lh-sm">
                                            <a href="#">file.txt</a>
                                        </h3>
                                        <p class="lh-sm">48kb</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                            <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="12" r="2" />
                                                <circle cx="12" cy="5" r="2" />
                                                <circle cx="12" cy="19" r="2" />
                                            </svg>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card mb-3">
                                <div class="card-body d-flex align-items-center">
                                    <span class="icon bg-neutral border rounded-circle">
                    <svg class="gi gi-file-text-fill fs-xs" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19.74 7.33l-4.44-5a1 1 0 0 0-.74-.33h-8A2.53 2.53 0 0 0 4 4.5v15A2.53 2.53 0 0 0 6.56 22h10.88A2.53 2.53 0 0 0 20 19.5V8a1 1 0 0 0-.26-.67zM9 12h3a1 1 0 0 1 0 2H9a1 1 0 0 1 0-2zm6 6H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zm-.29-10a.79.79 0 0 1-.71-.85V4l3.74 4z"/>
                    </svg>
                  </span>
                                    <span class="avatar avatar-sm bg-success mr-3 ml-n3 border rounded-circle">jd</span>
                                    <div class="mr-auto">
                                        <h3 class="mb-2 fs-xxs lh-sm">
                                            <a href="#">file.txt</a>
                                        </h3>
                                        <p class="lh-sm">56kb</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                            <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="12" r="2" />
                                                <circle cx="12" cy="5" r="2" />
                                                <circle cx="12" cy="19" r="2" />
                                            </svg>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-body d-flex align-items-center">
                                    <span class="icon bg-neutral border rounded-circle">
                    <svg class="gi gi-file-text-fill fs-xs" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                      <path d="M19.74 7.33l-4.44-5a1 1 0 0 0-.74-.33h-8A2.53 2.53 0 0 0 4 4.5v15A2.53 2.53 0 0 0 6.56 22h10.88A2.53 2.53 0 0 0 20 19.5V8a1 1 0 0 0-.26-.67zM9 12h3a1 1 0 0 1 0 2H9a1 1 0 0 1 0-2zm6 6H9a1 1 0 0 1 0-2h6a1 1 0 0 1 0 2zm-.29-10a.79.79 0 0 1-.71-.85V4l3.74 4z"/>
                    </svg>
                  </span>
                                    <span class="avatar avatar-sm bg-info mr-3 ml-n3 border rounded-circle">jd</span>
                                    <div class="mr-auto">
                                        <h3 class="mb-2 fs-xxs lh-sm">
                                            <a href="#">file.txt</a>
                                        </h3>
                                        <p class="lh-sm">64kb</p>
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn" data-toggle="dropdown" type="button" aria-haspopup="true" aria-expanded="false">
                                            <svg class="gi gi-more-vertical fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="12" r="2" />
                                                <circle cx="12" cy="5" r="2" />
                                                <circle cx="12" cy="19" r="2" />
                                            </svg>
                                            <span class="sr-only">Toggle Dropdown</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button">Action</button>
                                            <button class="dropdown-item" type="button">Another action</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="newProject" tabindex="-1" role="dialog" aria-labelledby="newProjectLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="fs-xs" id="newProjectLabel">New Project</h2>
                            <button class="btn btn-sm btn-circle btn-neutral align-self-start" data-dismiss="modal" type="button" aria-label="Close">
                                <svg class="gi gi-close fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z" />
                                </svg>
                            </button>
                        </div>
                        <div class="modal-body p-0">
                            <ul class="nav nav-tabs nav-justified p-3 px-sm-5 rounded-0" role="tablist" aria-orientation="horizontal">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#projectDetails" role="tab" aria-controls="projectDetails" aria-selected="true">Details</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#projectMembers" role="tab" aria-controls="projectMembers" aria-selected="false">Members</a>
                                </li>
                            </ul>
                            <div class="px-3 py-5 px-sm-5">
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="projectDetails" role="tabpanel">
                                        <form>
                                            <label for="projectTitle">Title</label>
                                            <input class="form-control form-control-lg mb-5" id="projectTitle" type="text" placeholder="Project title">
                                            <label for="projectDescription">Description</label>
                                            <textarea class="form-control mb-5" id="projectDescription" rows="3" placeholder="Project description"></textarea>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="projectStartDate">Start date</label>
                                                    <input class="form-control form-control-lg mb-5" id="projectStartDate" type="text" placeholder="mm/dd/yyyy" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="projectEndDate">End date</label>
                                                    <input class="form-control form-control-lg mb-5" id="projectEndDate" type="text" placeholder="mm/dd/yyyy" required>
                                                </div>
                                            </div>
                                            <div class="alert alert-dismissible mb-5 text-white bg-primary fade show" role="alert">
                                                You can change due dates at any time.
                                                <button class="btn close" data-dismiss="alert" type="button" aria-label="Close">
                                                    <svg class="gi gi-close fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <label for="projectDropzone">Files</label>
                                            <label class="w-100 mb-5">
                                                <input class="d-none" id="projectDropzone" type="file">
                                                <span class="dropzone">Select or drag & drop your files for upload</span>
                                            </label>
                                            <label>Visibility</label>
                                            <div class="d-flex flex-wrap justify-content-between">
                                                <div class="form-check form-label mr-5">
                                                    <input class="form-check-input" id="projectVisibilityEveryone" name="projectVisibility" type="radio" checked>
                                                    <label class="form-check-label" for="projectVisibilityEveryone">Everyone</label>
                                                </div>
                                                <div class="form-check form-label mr-5">
                                                    <input class="form-check-input" id="projectVisibilityMembers" name="projectVisibility" type="radio">
                                                    <label class="form-check-label" for="projectVisibilityMembers">Members</label>
                                                </div>
                                                <div class="form-check form-label">
                                                    <input class="form-check-input" id="projectVisibilityMe" name="projectVisibility" type="radio">
                                                    <label class="form-check-label" for="projectVisibilityMe">Just me</label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="projectMembers" role="tabpanel">
                                        <form>
                                            <div class="input-group mb-5">
                                                <div class="input-group-prepend">
                                                    <svg class="gi gi-funnel-outline fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M13.9 22a1 1 0 0 1-.6-.2l-4-3.05a1 1 0 0 1-.39-.8v-3.27l-4.8-9.22A1 1 0 0 1 5 4h14a1 1 0 0 1 .86.49 1 1 0 0 1 0 1l-5 9.21V21a1 1 0 0 1-.55.9 1 1 0 0 1-.41.1zm-3-4.54l2 1.53v-4.55A1 1 0 0 1 13 14l4.3-8H6.64l4.13 8a1 1 0 0 1 .11.46z" />
                                                    </svg>
                                                </div>
                                                <input class="form-control form-control-lg" type="search" placeholder="Search" aria-label="Search">
                                            </div>
                                        </form>
                                        <h3 class="fs-xs">Members</h3>
                                        <hr class="mb-0">
                                        <div class="d-flex py-5 border-bottom">
                                            <span class="avatar avatar-sm mr-3 bg-primary rounded-circle">jd</span>
                                            <div class="mr-auto">
                                                <h4 class="mb-2 fs-xxs lh-sm">John Doe</h4>
                                                <p class="lh-sm">Manhattan</p>
                                            </div>
                                            <div class="form-check align-self-center ml-3">
                                                <input class="form-check-input" id="checkboxOne" type="checkbox">
                                                <label class="sr-only" for="checkboxOne">Checkbox</label>
                                            </div>
                                        </div>
                                        <div class="d-flex py-5 border-bottom">
                                            <span class="avatar avatar-sm mr-3 bg-success rounded-circle">jd</span>
                                            <div class="mr-auto">
                                                <h4 class="mb-2 fs-xxs lh-sm">John Doe</h4>
                                                <p class="lh-sm">Manhattan</p>
                                            </div>
                                            <div class="form-check align-self-center ml-3">
                                                <input class="form-check-input" id="checkboxTwo" type="checkbox">
                                                <label class="sr-only" for="checkboxTwo">Checkbox</label>
                                            </div>
                                        </div>
                                        <div class="d-flex py-5 border-bottom">
                                            <span class="avatar avatar-sm mr-3 bg-info rounded-circle">jd</span>
                                            <div class="mr-auto">
                                                <h4 class="mb-2 fs-xxs lh-sm">John Doe</h4>
                                                <p class="lh-sm">Manhattan</p>
                                            </div>
                                            <div class="form-check align-self-center ml-3">
                                                <input class="form-check-input" id="checkboxThree" type="checkbox">
                                                <label class="sr-only" for="checkboxThree">Checkbox</label>
                                            </div>
                                        </div>
                                        <div class="d-flex py-5 border-bottom">
                                            <span class="avatar avatar-sm mr-3 bg-warning rounded-circle">jd</span>
                                            <div class="mr-auto">
                                                <h4 class="mb-2 fs-xxs lh-sm">John Doe</h4>
                                                <p class="lh-sm">Manhattan</p>
                                            </div>
                                            <div class="form-check align-self-center ml-3">
                                                <input class="form-check-input" id="checkboxFour" type="checkbox">
                                                <label class="sr-only" for="checkboxFour">Checkbox</label>
                                            </div>
                                        </div>
                                        <div class="d-flex py-5 border-bottom">
                                            <span class="avatar avatar-sm mr-3 bg-danger rounded-circle">jd</span>
                                            <div class="mr-auto">
                                                <h4 class="mb-2 fs-xxs lh-sm">John Doe</h4>
                                                <p class="lh-sm">Manhattan</p>
                                            </div>
                                            <div class="form-check align-self-center ml-3">
                                                <input class="form-check-input" id="checkboxFive" type="checkbox">
                                                <label class="sr-only" for="checkboxFive">Checkbox</label>
                                            </div>
                                        </div>
                                        <div class="d-flex py-5 border-bottom">
                                            <span class="avatar avatar-sm mr-3 bg-primary rounded-circle">jd</span>
                                            <div class="mr-auto">
                                                <h4 class="mb-2 fs-xxs lh-sm">John Doe</h4>
                                                <p class="lh-sm">Manhattan</p>
                                            </div>
                                            <div class="form-check align-self-center ml-3">
                                                <input class="form-check-input" id="checkboxSix" type="checkbox">
                                                <label class="sr-only" for="checkboxSix">Checkbox</label>
                                            </div>
                                        </div>
                                        <div class="d-flex py-5 border-bottom">
                                            <span class="avatar avatar-sm mr-3 bg-success rounded-circle">jd</span>
                                            <div class="mr-auto">
                                                <h4 class="mb-2 fs-xxs lh-sm">John Doe</h4>
                                                <p class="lh-sm">Manhattan</p>
                                            </div>
                                            <div class="form-check align-self-center ml-3">
                                                <input class="form-check-input" id="checkboxSeven" type="checkbox">
                                                <label class="sr-only" for="checkboxSeven">Checkbox</label>
                                            </div>
                                        </div>
                                        <div class="d-flex py-5 border-bottom">
                                            <span class="avatar avatar-sm mr-3 bg-info rounded-circle">jd</span>
                                            <div class="mr-auto">
                                                <h4 class="mb-2 fs-xxs lh-sm">John Doe</h4>
                                                <p class="lh-sm">Manhattan</p>
                                            </div>
                                            <div class="form-check align-self-center ml-3">
                                                <input class="form-check-input" id="checkboxEight" type="checkbox">
                                                <label class="sr-only" for="checkboxEight">Checkbox</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-block btn-lg btn-primary" type="submit">Create Project</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="inviteUsers" tabindex="-1" role="dialog" aria-labelledby="inviteUsersLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h2 class="fs-xs" id="inviteUsersLabel">Invite Users</h2>
                            <button class="btn btn-sm btn-circle btn-neutral align-self-start" data-dismiss="modal" type="button" aria-label="Close">
                                <svg class="gi gi-close fs-sm" width="1em" height="1em" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M13.41 12l4.3-4.29a1 1 0 1 0-1.42-1.42L12 10.59l-4.29-4.3a1 1 0 0 0-1.42 1.42l4.3 4.29-4.3 4.29a1 1 0 0 0 0 1.42 1 1 0 0 0 1.42 0l4.29-4.3 4.29 4.3a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42z" />
                                </svg>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form>
                                <label for="recipientEmail">Email</label>
                                <input class="form-control form-control-lg mb-5" id="recipientEmail" type="email" placeholder="Email Address">
                                <label for="recipientDescription">Description</label>
                                <textarea class="form-control" id="recipientDescription" rows="3" placeholder="Brief description"></textarea>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-block btn-lg btn-primary" type="submit">Send Invite</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js" integrity="sha384-6khuMg9gaYr5AxOqhkVIODVIvm9ynTT5J4V1cfthmT+emCG6yVmEZsRHdxlotUnm" crossorigin="anonymous"></script>
</body>

</html>