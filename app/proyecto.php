<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\donacion;

class proyecto extends Model
{
    //
    protected $fillable = [
        'titulo', 'descripcion', 'shortDescripcion','imagenPath','videoPath', 'fechaInicio',
        'fechaFin','objetivo','minDonacion','maxDonacion','donacionPorDefecto','user_id'
    ];

    public function totalRecaudado(){
        $total=0;
        foreach (donacion::all() as $donacion){
            if($this->id == $donacion->proyecto_id){
                $total+=$donacion->importe;
            }
        }
        return $total;
    }







    public function porcentaje(){
       return  ($this->totaLRecaudado()*100)/$this->objetivo;
    }
}
