<!doctype html>
<html lang="es">
<head>
    <title>Reporte de ventas</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="row">

    <h5>De {{\carbon\carbon::parse($inicio)->format('d/m/Y')}} a {{\carbon\carbon::parse($fin)->format('d/m/Y')}}</h5>
        <table class="table table-bordered">
            <thead  class="thead-primary">
            <tr>
                <th>
                    Fecha
                </th>
                <th>
                    No.pedido
                </th>
                <th>
                    No.pago
                </th>
                <th>
                    Cliente
                </th>
                <th>
                    NIT
                </th>
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
                <th>
                    Categoría
                </th>
                <th>
                    Operador
                </th>
            </tr>
            </thead>
            @foreach($pagos as $pago)
            @foreach($detalles as $detalle)
                @if($detalle->pedido_id == $pago->pedido_id)
                <tr>
                    <td>
                        {{\carbon\carbon::parse($pago->fechapago)->format('d/m/Y')}}
                    </td>
                    <td>
                        {{$pago->pedido->id}}
                    </td>
                    <td>
                        {{$pago->id}}
                    </td>
                    <td>
                        {{$pago->cliente->nombre}}
                    </td>
                    <td>
                        {{$pago->cliente->nit}}
                    </td>
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
                    <td>
                        {{$detalle->producto->categoria->categoria}}
                    </td>
                    <td>
                        {{$pago->usuario->nombre}}
                    </td>
                </tr>
                @endif
                @endforeach
                @endforeach
                </tbody>
        </table>

    <br><br><br><br>
    <span>Total:&nbsp;{{$total}}</span>
            <br>
            <span>Descuento:&nbsp;{{$descuento}}</span>
            <br>
            <span>Liquido:&nbsp;{{$liquido}}</span>
</div>
</body>

</html>


