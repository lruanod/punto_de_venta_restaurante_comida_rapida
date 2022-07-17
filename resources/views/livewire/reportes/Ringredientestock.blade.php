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
                    Ingrediente
                </th>
                <th>
                    Descripción
                </th>
                <th>
                    Disponibilidad
                </th>
                <th>
                    Estado
                </th>
            </tr>
            </thead>

            @foreach($ingredientes as $ingrediente)
                <tr>
                    <td>
                        {{$ingrediente->ingrediente}}
                    </td>
                    <td>
                        {{$ingrediente->descripcionin}}
                    </td>
                    <td>
                        {{$ingrediente->stock}}
                    </td>
                    <td>
                        {{$ingrediente->estado}}
                    </td>
                </tr>
                @endforeach
                </tbody>
        </table>
</div>
</body>

</html>


