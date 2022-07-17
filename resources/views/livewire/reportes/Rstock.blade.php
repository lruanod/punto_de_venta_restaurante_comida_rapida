<!doctype html>
<html lang="es">
<head>
    <title>Reporte de stock</title>
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<body>
<div class="row">
        <table class="table table-bordered">
            <thead  class="thead-primary">
            <tr>
                <th>
                    Producto
                </th>
                <th>
                    Precio
                </th>
                <th>
                    Descuento
                </th>
                <th>
                    Descripción
                </th>
                <th>
                    Categoría
                </th>
                <th>
                    Ingredientesho
                </th>
            </tr>
            </thead>

            @foreach($productos as $producto)
                <tr>
                    <td>
                        {{$producto->nombre}}
                    </td>
                    <td>
                        {{$producto->precio}}
                    </td>
                    <td>
                        {{$producto->descuento}}
                    </td>
                    <td>
                        {{$producto->descripcion}}
                    </td>
                    <td>
                        {{$producto->categoria->categoria}}
                    </td>
                    <td>
                        @foreach($detalles as $detalle)
                            @if($detalle->producto_id == $producto->id)
                                {{$detalle->ingrediente->ingrediente}}&nbsp;stock:&nbsp;{{$detalle->ingrediente->stock}}<br>
                            @endif
                        @endforeach
                    </td>
                </tr>
                @endforeach
                </tbody>
        </table>
</div>
</body>

</html>


