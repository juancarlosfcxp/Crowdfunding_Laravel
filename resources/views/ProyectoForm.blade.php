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
<h3 class="text-center">CREAR UN NUEVO PROYECTO</h3>
<div class="container">
<form name="proyectoForm" id="proyectoForm" action="/crearProyecto" method="post" enctype="multipart/form-data">
        @csrf
    <div class="form-group">
        <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo del Proyecto">
    </div>
    <div class="form-group">
        <label for="descripcion">Descripcion</label>
        <textarea class="form-control" id="descripcion" name="descripcion" rows="4"></textarea>
    </div>
    <div class="form-group">
        <label for="shortDescripcion">Descripcion Corta</label>
        <textarea class="form-control" id="shortDescripcion" name="shortDescripcion" rows="2"></textarea>
    </div>
    <div class="form-group row">
        <div class="col-6">
            <label for="imagenPath">Imagen</label>
            <input type="file" class="form-control-file" id="imagenPath" name="imagenPath">
        </div>
        <div class="col-6">
            <label for="videoPath">Video</label>
            <input type="file" class="form-control-file" id="videoPath" name="videoPath">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-6">
            <label for="fechaInicio">Fecha Inicio</label>
            <input type="date" class="form-control" id="fechaInicio" name="fechaInicio">
        </div>
        <div class="col-6">
            <label for="fechaFin">Fecha Fin</label>
            <input type="date" class="form-control" id="fechaFin" name="fechaFin">
        </div>
    </div>
    <div class="form-group row">
        <div class="col-3">
            <label for="objetivo">Objetivo</label>
            <input type="number" class="form-control" id="objetivo" name="objetivo">
        </div>
        <div class="col-3">
            <label for="minDonacion">Donacion Minima</label>
            <input type="number" class="form-control" id="minDonacion" name="minDonacion">
        </div>
        <div class="col-3">
            <label for="maxDonacion">Donacion Maxima</label>
            <input type="number" class="form-control" id="maxDonacion" name="maxDonacion">
        </div>
        <div class="col-3">
            <label for="donacionPorDefecto">Donacion Por Defecto</label>
            <input type="number" class="form-control" id="donacionPorDefecto" name="donacionPorDefecto">
        </div>
    </div>
    <button type="submit" class="btn btn-success btn-block">Crear</button>
</form>
</div>
</body>
</html>
