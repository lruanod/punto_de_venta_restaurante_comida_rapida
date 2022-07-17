<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $fillable =['stock','fecha','stockentrada','descripcion','usuario_id','ingrediente_id'];
   // protected $casts =['fecha'=> 'date:Y-m-d'];

    /***  relacion de entrada solo tiene un ingrediente**/
    public function ingrediente(){
        return $this->belongsTo('App\Models\Ingrediente');
    }

    /***  relacion de entrada solo tiene un usuario**/
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }
}
