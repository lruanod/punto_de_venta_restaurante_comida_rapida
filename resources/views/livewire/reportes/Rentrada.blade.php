<!doctype html>
<html lang="es">
<head>
    <title>Reporte de entradas</title>
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
                    Ingrediente
                </th>
                <th>
                    Disponibilidad anterior
                </th>
                <th>
                    Disponibilidad ingresada
                </th>
                <th>
                    Descripción
                </th>
                <th>
                    Operador
                </th>
            </tr>
            </thead>

            @foreach($entradas as $entrada)
                <tr>
                    <td>
                        {{\carbon\carbon::parse($entrada->fecha)->format('d/m/Y')}}
                    </td>
                    <td>
                        {{$entrada->ingrediente->ingrediente}}
                    </td>
                    <td>
                        {{$entrada->stock}}
                    </td>
                    <td>
                        {{$entrada->stockentrada}}
                    </td>
                    <td>
                        {{$entrada->descripcion}}
                    </td>
                    <td>
                        {{$entrada->usuario->nombre}}
                    </td>
                </tr>

                @endforeach
                </tbody>
        </table>
</div>
</body>

</html>


