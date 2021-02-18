@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"><p style="font-size: 20px">Proyectos</p></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="row">
                        @foreach($proyectos as $proyecto)
                            <div class="col-12 col-md-6 col-lg-4 my-4">
                                <div class="card" style="width: 18rem;">
                                    <a  class="card-title text-uppercase pt-3 pl-3" href={{"detalleProyecto$proyecto->id"}}><h4>{{$proyecto->titulo}}</h4></a>
                                    <hr>
                                    <a href={{"detalleProyecto$proyecto->id"}} >
                                        <img class="card-img-top" src="{{Storage::url($proyecto->imagenPath)}}" alt="Card image cap">
                                    </a>
                                    <div class="card-body">
                                        <p class="card-text"><strong>{{$proyecto->shortDescripcion}}</strong></p>
                                    <div class="row">
                                        <div class="col-5">
                                            <label>Objetivo</label>
                                            <h3>{{$proyecto->objetivo}}€</h3>
                                        </div>
                                        <div class="col-5 offset-2">
                                            <label>Recaudado</label>
                                            <h3>{{$proyecto->totalRecaudado()}}€</h3>
                                        </div>
                                    </div>
                                </div>
                                </div>

                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
