<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\proyecto;

class proyectoController extends Controller
{
    public function showForm() {
        return view("ProyectoForm");
    }

    public function showDetalle($id){
    $detalle=proyecto::query()
        ->where('id', $id)
        ->first();
    return view("detalle",compact('detalle'));
    }

    public function crearProyecto(Request $request) {


        $proyecto = new proyecto();
        $proyecto->titulo=$request->input("titulo");
        $proyecto->descripcion=$request->input("descripcion");
        $proyecto->shortDescripcion=$request->input("shortDescripcion");
        $proyecto->imagenPath=$request->file("imagenPath")->store("public");
        $proyecto->videoPath=$request->file("videoPath")->store("public");
        $proyecto->fechaInicio=$request->input("fechaInicio");
        $proyecto->fechaFin=$request->input("fechaFin");
        $proyecto->objetivo=$request->input("objetivo");
        $proyecto->minDonacion=$request->input("minDonacion");
        $proyecto->maxDonacion=$request->input("maxDonacion");
        $proyecto->donacionPorDefecto=$request->input("donacionPorDefecto");
        $proyecto->user_id=1;

        $proyecto->save();
        $proyectos = proyecto::all();
        return view("home",compact('proyectos'));
    }
}
