<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $fillable =['nombre','usuario','pass','rol','estado'];

    /***  relacion de usuario muchos entradas,pedidos,pagos**/
    public function usuarios(){
        return $this->hasMany('App\Models\Entrada','App\Models\Pedido','App\Models\Pago');
    }
}
