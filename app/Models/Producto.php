<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $fillable =['nombre','precio','descripcion','url','descuento','estado','categoria_id'];

    /***  relacion de producto solo tiene una categoria**/
    public function categoria(){
        return $this->belongsTo('App\Models\Categoria');
    }

    /***  relacion de productos a muchos detalles**/
    public function productos(){

        return $this->hasMany('App\Models\Detalleingrediente','App\Models\Detalleproducto','App\Models\Detalle');
    }

}
