<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable =['nombre','direccion','nit'];

    /***  relacion de clientes a muchos pagos**/
    public function clientes(){

        return $this->hasMany('App\Models\Pago');
    }
}

