<!doctype html>
<html lang="es">
<head>
    <title>Boleta</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="row">
    <div class="col-2">
            @foreach($pedidos as $pedido)
            No.{{$pedido->id}}<br>
            Fecha:&nbsp;{{\carbon\carbon::parse($pedido->fechapedido)->format('d/m/Y')}}<br>
            Referencia:&nbsp;{{$pedido->referencia}}<br>
            Estado:&nbsp;{{$pedido->estado}}<br>
            Operador:&nbsp;{{$pedido->usuario->nombre}}&nbsp;Rol:&nbsp;{{$pedido->usuario->rol}}
            @endforeach
                <table>
                    <tbody>
                    <tr>
                        <td>PRODUCTO&nbsp;</td>
                        <td>OBSERVACIÓN&nbsp;</td>
                        <td>CANTIDAD&nbsp;</td>
                        <td>PRECIO&nbsp;</td>
                        <td>DESCUENTO&nbsp;</td>
                        <td>TOTAL&nbsp;</td>
                    </tr>
            @foreach($detalles as $detalle)
                   <tr>
                       <td>{{$detalle->producto->nombre}}</td>
                       <td>{{$detalle->observacion}}</td>
                       <td>{{$detalle->cantidad}}</td>
                       <td>{{$detalle->preciodetalle}}</td>
                       <td>{{$detalle->descuento}}</td>
                       <td>{{$detalle->subtotal}}</td>
                   </tr>
                @endforeach
            @foreach($pedidos as $pedido)
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>

                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>Total descuentos:</td>
                            <td>{{$pedido->descuento}}</td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>&nbsp;</td>
                            <td>Total :</td>
                            <td>{{$pedido->total}}</td>
                        </tr>
                @endforeach
                    </tbody>
                </table>
</div>
</div>
</body>

</html>


