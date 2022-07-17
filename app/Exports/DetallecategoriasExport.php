<?php

namespace App\Exports;

use App\Models\Detalle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DetallecategoriasExport implements FromQuery,withHeadings
{

    use Exportable;
    public function headings(): array
    {
        return [
            'Fecha',
            'No.pedido',
            'No.pago',
            'Cliente',
            'NIT',
            'Cantidad',
            'Producto',
            'Observaciones',
            'Descuento',
            'Precio',
            'Subtotal',
            'Categoria',
            'Operador',
        ];

    }

    public function __construct( string $inicio,$final,$categoria_id)
    {
        $this->inicio = $inicio;
        $this->final = $final;
        $this->categoria_id= $categoria_id;
    }

    public function query()
    {
        if($this->categoria_id){
            return Detalle::query()->join('pedidos','detalles.pedido_id','pedidos.id')
                ->join('pagos','pedidos.id','pagos.pedido_id')
                ->join('productos','detalles.producto_id','productos.id')
                ->join('categorias','productos.categoria_id','categorias.id')
                ->join('clientes','pagos.cliente_id','clientes.id')
                ->join('usuarios','pagos.usuario_id','usuarios.id')
                ->whereBetween('pagos.fechapago',array($this->inicio,$this->final))
                ->orderBy("detalles.created_at", "desc")
                ->where('productos.categoria_id','=',$this->categoria_id)
                ->select("pagos.fechapago",
                    "pedidos.id",
                    "pagos.id as npedido",
                    "clientes.nombre as cnombre",
                    "clientes.nit",
                    "detalles.cantidad",
                    "productos.nombre as nproducto",
                    "detalles.observacion",
                    "detalles.descuento as desc",
                    "detalles.preciodetalle",
                    "detalles.subtotal",
                    "categorias.categoria",
                    "usuarios.nombre as unombre",
                );
        } else{
            return Detalle::query()->join('pedidos','detalles.pedido_id','pedidos.id')
                ->join('pagos','pedidos.id','pagos.pedido_id')
                ->join('productos','detalles.producto_id','productos.id')
                ->join('categorias','productos.categoria_id','categorias.id')
                ->join('clientes','pagos.cliente_id','clientes.id')
                ->join('usuarios','pagos.usuario_id','usuarios.id')
                ->whereBetween('pagos.fechapago',array($this->inicio,$this->final))
                ->orderBy("detalles.created_at", "desc")
                ->select("pagos.fechapago",
                    "pedidos.id",
                    "pagos.id as npedido",
                    "clientes.nombre as cnombre",
                    "clientes.nit",
                    "detalles.cantidad",
                    "productos.nombre as nproducto",
                    "detalles.observacion",
                    "detalles.descuento as desc",
                    "detalles.preciodetalle",
                    "detalles.subtotal",
                    "categorias.categoria",
                    "usuarios.nombre as unombre",
                );
        }

    }
}
