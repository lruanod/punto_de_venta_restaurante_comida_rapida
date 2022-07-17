<?php

namespace App\Exports;

use App\Models\Detalle;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;

class DetalleusuariosExport implements FromQuery,withHeadings
{
    use Exportable;
    public function headings(): array
    {
        return [
            'Fecha',
            'No.pedido',
            'No.pago',
            'Categoria',
            'Producto',
            'Precio',
            'Descuento',
            'Cantidad',
            'Subtotal',
            'Cliente',
            'NIT',
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
            return Detalle::query()->join('pedidos','detalles.pedido_id','pedidos.id')
                ->join('pagos','pedidos.id','pagos.pedido_id')
                ->join('productos','detalles.producto_id','productos.id')
                ->join('categorias','productos.categoria_id','categorias.id')
                ->join('clientes','pagos.cliente_id','clientes.id')
                ->join('usuarios','pagos.usuario_id','usuarios.id')
                ->whereBetween('pagos.fechapago',array($this->inicio,$this->final))
                ->orderBy("detalles.created_at", "desc")
                ->where('pagos.usuario_id','=',$this->usuario_id)
                ->select("pagos.fechapago",
                    "pedidos.id",
                    "pagos.id as npedido",
                    "categorias.categoria",
                    "productos.nombre as nproducto",
                    "detalles.preciodetalle",
                    "detalles.descuento as desc",
                    "detalles.cantidad",
                    "detalles.subtotal",
                    "clientes.nombre as cnombre",
                    "clientes.nit",
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
                    "categorias.categoria",
                    "productos.nombre as nproducto",
                    "detalles.preciodetalle",
                    "detalles.descuento as desc",
                    "detalles.cantidad",
                    "detalles.subtotal",
                    "clientes.nombre as cnombre",
                    "clientes.nit",
                    "usuarios.nombre as unombre",
                );
        }

    }
}
