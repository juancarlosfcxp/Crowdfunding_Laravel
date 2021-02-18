<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\donacion;
class donacionController extends Controller
{

    public function donar(Request $request) {


        $donacion = new donacion();

        $donacion->importe=$request->input("importe");
        $donacion->proyecto_id=$request->input("proyecto_id");
        $donacion->user_id=auth()->id();

        $donacion->save();
        return redirect()->route('home');
    }
}
