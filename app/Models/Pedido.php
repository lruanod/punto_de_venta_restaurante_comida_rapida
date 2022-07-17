<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable =['estado','referencia','fechapedido','total','descuento','usuario_id'];
    /***  relacion de pedido solo tiene un usuario**/
    public function usuario(){
        return $this->belongsTo('App\Models\Usuario');
    }

    /***  relacion de pedido a muchos detalles,pagos**/
    public function pedidos(){

        return $this->hasMany('App\Models\Detalle','App\Models\Pago');
    }
}
