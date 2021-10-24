<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>

    <!-- Custom Scripts -->
    @yield('scripts')

    <!-- Fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
    <!--<link href="../resources/css/dashboard.css" rel="stylesheet">-->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    @yield('styles')
</head>
<body>
    <div id="app">
    
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm  sticky-top flex-md-nowrap p-1">
            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="{{ url('/') }}">
                NOMBRE APP
            </a>
            <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <label class="form-control form-control-white w-100">{{ date('d-m-Y H:i') }} </label>
            <ul class="navbar-nav px-3">
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                        </li>
                    @endif
                            
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                        </li>
                    @endif
                @else
                    
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Cerrar Sesión') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                  @csrf
                            </form>
                        </div>
                    </li>
                @endguest
        </ul>            
   
        </nav>
        <!-- SEGUNDA SECCIÓN MENÚ IZQUIERDA -->
        <div class="container-fluid">
            <div class="row">
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                    <div class="sidebar-sticky pt-3">
                        <ul class="nav flex-column">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                    <span data-feather="alert-circle"></span>
                                    Acerca de
                                    </a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}" href="{{ url('/home') }}">
                                <span data-feather="home"></span>
                                Inicio
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="{{ Request::path() === 'clientes' ? 'nav-link active' : 'nav-link' }}" href="{{ url('/clientes') }}">
                                <span data-feather="users"></span>
                                Clientes
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="{{ Request::path() === 'refacciones' ? 'nav-link active' : 'nav-link' }}" href="{{ url('/refacciones') }}">
                                <span data-feather="layers"></span>
                                Refacciones
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="{{ Request::path() === 'servicios' ? 'nav-link active' : 'nav-link' }}" href="{{ url('/servicios') }}">
                                <span data-feather="monitor"></span>
                                Registro servicio
                                </a>
                            </li>
                            
                            <li class="nav-item">
                                <a class="{{ Request::path() === 'reportes' ? 'nav-link active' : 'nav-link' }}" href="{{ url('/reportes') }}">
                                <span data-feather="bar-chart-2"></span>
                                Reportes
                                </a>
                            </li>
                        @endguest
                        </ul>
                    </div>
                </nav>

                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
                    @yield('content')
                </main>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.slim.min.js"><\/script>')</script><script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
    <script src="{{ asset('js/dashboard.js') }}" defer></script>

</body>

</html>
