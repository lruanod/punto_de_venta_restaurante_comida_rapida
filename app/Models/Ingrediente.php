<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingrediente extends Model
{
    protected $fillable =['ingrediente','stock','descripcionin','estado'];

    /***  relacion de ingredientes a muchos detalles  y entradas**/
    public function ingredientes(){

        return $this->hasMany('App\Models\Detalleingrediente','App\Models\Entrada','App\Models\Detalleproducto');
    }


}
