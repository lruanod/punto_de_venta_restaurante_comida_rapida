<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalleproducto extends Model
{
    protected $fillable =['detalle_id','producto_id','ingrediente_id','numero'];

    /***  relacion de detalle solo tiene un producto**/
    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }

    /***  relacion de detalle solo tiene un ingrediente**/
    public function ingrediente(){
        return $this->belongsTo('App\Models\Ingrediente');
    }

    /***  relacion de detalle solo tiene un detalle**/
    public function detalle(){
        return $this->belongsTo('App\Models\Detalle');
    }



}
