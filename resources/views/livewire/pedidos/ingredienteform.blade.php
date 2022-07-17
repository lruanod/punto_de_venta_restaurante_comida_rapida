<div class="row col-12  mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Listado de ingredientes</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>
                    No.
                </th>
                <th>
                    Producto
                </th>
                <th>
                    Ingrediente
                </th>
                <th>
                    Acción
                </th>
            </tr>
            </thead>
            <tbody>

            @foreach($detalleproductos as $detalle)
                <tr>
                    <td>
                        {{$detalle->numero}}
                    </td>
                    <td>
                        {{$detalle->producto->nombre}}
                    </td>
                    <td>
                        {{$detalle->ingrediente->ingrediente}}
                    </td>
                    <td>
                        <button type="button" class="btn-sm btn-danger " title="Eliminar" wire:click="destroyingrediente({{$detalle->id}})" >
                            <i class="bi-scissors text-white"></i>
                        </button>
                    </td>

                </tr>


            @endforeach
            </tbody>
        </table>
    </div>
    <br>
    {{$detalleproductos->links()}}
</div>







