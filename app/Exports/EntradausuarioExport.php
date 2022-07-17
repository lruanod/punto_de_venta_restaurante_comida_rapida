<?php

namespace App\Exports;

use App\Models\Entrada;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EntradausuarioExport implements FromQuery,withHeadings
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

    public function __construct( string $inicio,$final,$usuario_id)
    {
        $this->inicio = $inicio;
        $this->final = $final;
        $this->usuario_id= $usuario_id;
    }
    public function query()
    {
        if($this->usuario_id){
            return Entrada::query()->join('ingredientes','entradas.ingrediente_id','ingredientes.id')
                ->join('usuarios','entradas.usuario_id','usuarios.id')
                ->whereBetween('entradas.fecha',array($this->inicio,$this->final))
                ->orderBy("entradas.created_at", "desc")
                ->where('entradas.usuario_id','=',$this->usuario_id)
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
