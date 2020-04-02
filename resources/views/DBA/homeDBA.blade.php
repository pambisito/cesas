<!DOCTYPE html>
<html lang="es" class=" js no-touch cssanimations js no-touch cssanimations">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Notas | Academia Cesas SMP</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- estilos -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap/bootstrap-home.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/propio.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cesas/theme-white.css') }}">
    <link rel="stylesheet" href="{{ asset('css/compiled/elements.css') }}">
    <link rel="stylesheet" href="{{ asset('css/compiled/layout.css') }}">
    
    <!-- iconos del menú -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <script type="text/javascript" src="{{ asset('js/jquery/jquery-2.2.3.min.js') }}"></script>
    <script src="{{ asset('js/scripts.js') }}"></script>
</head>
<body class="theme-blue-gradient fixed-header pace-done">
    <div class="pace pace-inactive">
        <div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
            <div class="pace-progress-inner"></div>
        </div>
        <div class="pace-activity"></div>
    </div>

    <!-- menú superior -->
    <header class="navbar" id="header-navbar">
        <div class="container">
            <a href="#" id="logo" class="navbar-brand">Sistema de Notas</a>
            <div class="clearfix">
                <button class="navbar-toggle" data-target=".navbar-ex1-collapse" data-toggle="collapse" type="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="fa fa-bars"></span>
                </button>
                <div class="nav-no-collapse navbar-left pull-left hidden-sm hidden-xs">
                    <ul class="nav navbar-nav pull-left">
                        <li>
                            <a class="btn" id="make-small-nav">
                                <i class="fa fa-bars"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="nav-no-collapse pull-right" id="header-nav">
                    <ul class="nav navbar-nav pull-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <span class="hidden-xs">
                                    {{ Auth::user()->apellidoPaterno." ".Auth::user()->apellidoMaterno." ".Auth::user()->nombres }}
                                </span> 
                            </a>
                        </li>
                        <li class="hidden-xxs">
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power-off"></i><span>Salir</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </header>

    <!-- cuerpo de la página -->
    <div id="page-wrapper" class="container">
        <div class="row">
            <!-- menú izquierda -->
            <div id="nav-col">
                <section id="col-left" class="col-left-nano" style="position: relative;">
                    <div id="col-left-inner" class="col-left-nano-content" style="position: relative;">
                        <div id="user-left-box" class="clearfix hidden-sm hidden-xs">
                            <div class="user-box">
                                <span class="name">Bienvenido<br>{{ Auth::user()->nombres }}</span>
                                <span class="status">
                                    <i class="fa fa-circle"></i>
                                    En línea
                                </span>
                            </div>
                        </div>
                        <div id="sidebar-nav" class="collapse navbar-collapse navbar-ex1-collapse">
                            <ul class="nav nav-pills nav-stacked">
                                <li>
                                    <a href="{{ route('login') }}">
                                        <i class="fa fa-home"></i>
                                        <span>Inicio</span>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" href="#">
                                        <i class="fa fa-user"></i>
                                        <span>Registrar persona</span>
                                        <i class="fa fa-chevron-circle-right drop-icon"></i>
                                    </a>
                                    <ul class="submenu" style="display: none;">
                                        <li>
                                            <a href="{{ route('academia.create') }}">
                                                <i class="fa fa-user"></i>
                                                &nbsp;&nbsp;Academia
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('colegio.create') }}">
                                                <i class="fa fa-user"></i>
                                                &nbsp;&nbsp;Colegio
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('profesor.create') }}">
                                                <i class="fa fa-user"></i>
                                                &nbsp;&nbsp;Profesor
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="{{ route('curso.create') }}">
                                        <i class="fas fa-book"></i>
                                        <span>Registar cursos</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off"></i>
                                        <span>Salir</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
            <!-- contenido de la página -->
            <div id="content-wrapper">
                @yield('content')
                <!-- footer -->
                <footer id="footer-bar" class="row" style="opacity: 1;">
                    <p id="footer-copyright" class="col-xs-12">&copy; Copyright 2020 Academia Cesas. Todos los derechos reservados</p>
                </footer>
            </div>
        </div>
    </div>
</body>
</html>