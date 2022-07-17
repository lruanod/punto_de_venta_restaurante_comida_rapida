<!doctype html>
<html lang="es">
<head>
    <title>Boleta</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="row">
    <h5>De {{\carbon\carbon::parse($inicio)->format('d/m/Y')}} a {{\carbon\carbon::parse($fin)->format('d/m/Y')}}</h5>
        @foreach($pagos as $pago)
        <div class="col-3"  style=" border-width: 4px; border-style: ridge; border-color: #1a1e21">
        <table class="table table-bordered">
                <tr>
                    <td>
                        No.
                    </td>
                    <td>
                        {{$pago->id}}
                    </td>
                </tr>
                <tr>
                    <td>
                        No.pedido
                    </td>
                    <td>
                        {{$pago->pedido->id}}
                    </td>
                </tr>
                <tr>
                    <td>Fecha:</td>
                    <td>

                        {{\carbon\carbon::parse($pago->pedido->fechapedido)->format('d/m/Y')}}
                    </td>
                </tr>
                <tr>
                    <td>Referencia:</td>
                    <td>
                        {{$pago->pedido->referencia}}
                    </td>
                </tr>
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
                <tr>
                    <td>Operador:</td>
                    <td>
                        {{$pago->usuario->nombre}}&nbsp;Rol:&nbsp;{{$pago->usuario->rol}}
                    </td>
                </tr>
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
                @if($detalle->pedido_id == $pago->pedido_id)
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
                @endif
                @endforeach
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>
                        Total descuentos:
                    </td>
                    <td>
                        {{$pago->descuento}}
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
                        {{$pago->total}}
                    </td>
                </tr>
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

                </tbody>
        </table>
        </div>
            <br><br>
        @endforeach
    <br>
    <span>Total:&nbsp;{{$total}}</span>
            <br>
            <span>Descuento:&nbsp;{{$descuento}}</span>
            <br>
            <span>Liquido:&nbsp;{{$liquido}}</span>
</div>
</body>

</html>


