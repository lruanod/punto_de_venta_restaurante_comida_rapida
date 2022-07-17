<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalleingrediente extends Model
{
    protected $fillable =['producto_id','ingrediente_id'];


    /***  relacion de detalle solo tiene un producto**/
    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }

    /***  relacion de detalle solo tiene un ingrediente**/
    public function ingrediente(){
        return $this->belongsTo('App\Models\Ingrediente');
    }


}
