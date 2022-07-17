<div class="row col-12  mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Listado de pedido</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>
                    Cantidad
                </th>
                <th>
                    Nombre
                </th>
                <th>
                    Descripción
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
                <th colspan="3">
                    Acción
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($detalles as $detalle)
                <tr>
                    <td>
                        {{$detalle->cantidad}}
                    </td>
                    <td>
                        {{$detalle->producto->nombre}}
                    </td>
                    <td>
                        {{$detalle->producto->descripcion}}
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
                        <button type="button" class="btn-sm btn-warning"  data-toggle="modal" data-target="#editingrediente" title="Editar ingredientes" wire:click="editingrediente({{$detalle->id}})" >
                            <i class="bi-basket text-white"></i>
                        </button>
                    </td>
                    <td>
                        <button type="button" class="btn-sm btn-info"  data-toggle="modal" data-target="#editproducto" title="Editar producto" wire:click="editproducto({{$detalle->id}})" >
                            <i class="bi-pencil-fill text-white"></i>
                        </button>
                    </td>

                    <td>
                        <button type="button" class="btn-sm btn-danger"  data-toggle="modal" data-target="#eliminarproducto" title="Eliminar detalle" wire:click="eliminarproducto({{$detalle->id}})" >
                            <i class="bi-trash text-white"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <br>
    {{$detalles->links()}}
</div>







