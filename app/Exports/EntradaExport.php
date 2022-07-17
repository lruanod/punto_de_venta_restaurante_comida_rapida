<?php

namespace App\Exports;

use App\Models\Detalle;
use App\Models\Entrada;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EntradaExport implements FromQuery,withHeadings
{
    use Exportable;
    public function headings(): array
    {
        return [
            'Fecha',
            'Ingrediente',
            'Disponibilidad anterior',
            'Disponibilidad ingresada',
            'Descripción',
            'Usuario operador',
        ];

    }

    public function __construct( string $inicio,$final,$ingrediente_id)
    {
        $this->inicio = $inicio;
        $this->final = $final;
        $this->ingrediente_id= $ingrediente_id;
    }
    public function query()
    {
        if($this->ingrediente_id){
            return Entrada::query()->join('ingredientes','entradas.ingrediente_id','ingredientes.id')
                ->join('usuarios','entradas.usuario_id','usuarios.id')
                ->whereBetween('entradas.fecha',array($this->inicio,$this->final))
                ->orderBy("entradas.created_at", "desc")
                ->where('entradas.ingrediente_id','=',$this->ingrediente_id)
                ->select("entradas.fecha",
                    "ingredientes.ingrediente",
                    "entradas.stock",
                    "entradas.stockentrada",
                    "entradas.descripcion",
                    "usuarios.nombre as unombre"
                );
        } else{
            return Entrada::query()->join('ingredientes','entradas.ingrediente_id','ingredientes.id')
                ->join('usuarios','entradas.usuario_id','usuarios.id')
                ->whereBetween('entradas.fecha',array($this->inicio,$this->final))
                ->orderBy("entradas.created_at", "desc")
                ->select("entradas.fecha",
                    "ingredientes.ingrediente",
                    "entradas.stock",
                    "entradas.stockentrada",
                    "entradas.descripcion",
                    "usuarios.nombre as unombre"
                );
        }

    }
}
