<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalle extends Model
{

    protected $fillable =['cantidad','preciodetalle','descuento','subtotal','observacion','producto_id','pedido_id'];

    /***  relacion de detalle solo tiene un pedido**/
    public function pedido(){
        return $this->belongsTo('App\Models\Pedido');
    }

    /***  relacion de detalle solo tiene un producto**/
    public function producto(){
        return $this->belongsTo('App\Models\Producto');
    }

    /***  relacion de detalles a muchos detalles **/
    public function detalles(){

        return $this->hasMany('App\Models\Detalleproducto');
    }

}
