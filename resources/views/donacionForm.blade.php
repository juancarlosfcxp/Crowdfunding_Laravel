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
<body style="width: 800px; margin: auto;" class="my-5">
<h3 class="text-center">HACER DONACION</h3>
<div class="container">
    <form name="proyectoForm" id="proyectoForm" action="/donar" method="post" enctype="multipart/form-data">
        @csrf
            <div class="col-3">
                <label for="donacionPorDefecto">Cuanto quieres donar {{$id[0]}}</label>
                <input type="number" class="form-control" id="importe" name="importe">
            </div>
        <button type="submit" class="btn btn-success btn-block">Continuar</button>
    </form>
</div>
</body>
</html>
