<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $fillable =['total','cambio','efectivo','descuento','cliente_id','pedido_id','usuario_id','fechapago'];

    /***  relacion de pago solo tiene un usuario**/
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }

    /***  relacion de pago solo tiene un pedido**/
    public function pedido(){
        return $this->belongsTo('App\Models\Pedido');
    }

    /***  relacion de pago solo tiene un cliente**/
    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }


}
