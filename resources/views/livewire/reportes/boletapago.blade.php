<!doctype html>
<html lang="es">
<head>
    <title>Boleta</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="col-3"  style=" border-width: 4px; border-style: ridge; border-color: #1a1e21">
        <table class="table table-bordered">
            @foreach($pedidos as $pedido)
                <tr>
                    <td>
                        No.
                    </td>
                    <td>
                        {{$pedido->id}}
                    </td>
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td>

                        {{\carbon\carbon::parse($pedido->fechapedido)->format('d/m/Y')}}
                    </td>
                </tr>
                <tr>
                    <td>Referencia:</td>
                    <td>
                        {{$pedido->referencia}}
                    </td>
                </tr>
                @foreach($pagos as $pago)
                <tr>
                    <td>Cliente:</td>
                    <td>
                        {{$pago->cliente->nombre}}
                    </td>
                </tr>
                <tr>
                    <td>NIT:</td>
                    <td>
                        {{$pago->cliente->nit}}
                    </td>
                </tr>
                <tr>
                    <td>Dirección:</td>
                    <td>
                        {{$pago->cliente->direccion}}
                    </td>
                </tr>
                @endforeach
                <tr>
                    <td>Operador:</td>
                    <td>
                        {{$pedido->usuario->nombre}}&nbsp;Rol:&nbsp;{{$pedido->usuario->rol}}
                    </td>
                </tr>
                @endforeach

                </tbody>
        </table>
        <h1 class="text-center">Detalle</h1>

        <table class="table table-bordered">
            <thead  class="thead-primary">
            <tr>
                <th>
                    Cantidad
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Observaciones
                </th>
                <th>
                    Descuento
                </th>
                <th>
                    Precio
                </th>
                <th>
                    subtotal
                </th>
            </tr>
            </thead>

            @foreach($detalles as $detalle)
                <tr>
                    <td>
                        {{$detalle->cantidad}}
                    </td>
                    <td>
                        {{$detalle->producto->nombre}}
                    </td>
                    <td>
                        {{$detalle->observacion}}
                    </td>
                    <td>
                        {{$detalle->descuento}}
                    </td>
                    <td>
                        {{$detalle->preciodetalle}}
                    </td>
                    <td>
                        {{$detalle->subtotal}}
                    </td>
                </tr>
                @endforeach
            @foreach($pedidos as $pedido)
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                        Total descuentos:
                    </td>
                    <td>
                        {{$pedido->descuento}}
                    </td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                        Total :
                    </td>
                    <td>
                        {{$pedido->total}}
                    </td>
                </tr>
            @endforeach
            @foreach($pagos as $pago)
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                        Efectivo:
                    </td>
                    <td>
                        {{$pago->efectivo}}
                    </td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                        Cambio :
                    </td>
                    <td>
                        {{$pago->cambio}}
                    </td>
                </tr>
                @endforeach
                </tbody>
        </table>
    </div>
</div>
</body>

</html>


