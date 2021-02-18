<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="max-width: 1000px; margin: auto;">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            Home
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/home"></a>
                </li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
                <li class="nav-item">
                    <a class="nav-link" href="/proyectoForm">Crear Proyecto</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="jumbotron col-12 col-md-9">
            <h1 class="display-4 text-uppercase">{{$detalle->titulo}}</h1>
            <img class="" style="max-width: 600px" src="{{Storage::url($detalle->imagenPath)}}">
            <p class="lead">{{$detalle->shortDescripcion}}</p>
            <hr class="my-4">
            <p>{{$detalle->descripcion}}</p>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Hacer Donacion</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form name="proyectoForm" id="proyectoForm" action="/donar" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="col-6 text-center offset-3">
                                    <label for="donacionPorDefecto">Cuanto quieres donar?</label>
                                    <input type="number" class="form-control text-center" id="importe" value={{$detalle->donacionPorDefecto}} name="importe" placeholder={{$detalle->donacionPorDefecto}}>
                                    <input type="hidden" class="form-control" id="proyecto_id" name="proyecto_id" value={{$detalle->id}}>
                                </div>
                                <div class="modal-footer justify-content-center">
                                    <button type="button " class="btn btn-secondary" data-dismiss="modal">Volver</button>
                                    <button type="submit" class="btn btn-success">Continuar</button>
                                </div>
                            </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
        <div class="col-12 col-md-3 px-2" style="width: 15rem;">
            <p class="pt-4" style="font-size: 20px">Total recaudado:</p>
            <h2><b>{{$detalle->totaLRecaudado()}}€</b></h2>
            <div class="progress">
                <div class="progress-bar {{$detalle->porcentaje()>50? "bg-success":"bg-danger"}}" role="progressbar" style="width: {{($detalle->porcentaje())}}%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <button type="button" class="btn btn-primary btn-block my-5" data-toggle="modal" data-target="#exampleModal">
                Hacer donacion
            </button>
        </div>
    </div>
</div>
</body>
</html>
