<div class="col-md-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Ingredientes</h4>
    </div>
</div>

<div class="col-md-10 mt-3">
    <div class=" row justify-content-center">
        <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );">
            <div class="card-header text-center text-white">
                Busqueda
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-3">

                        <div class="row form-group">
                            <label for="buscar" class="text-white">Nombre del ingrediente</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control col-md-3">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ ingredientes</label><br>
                        <button type="button" class="btn btn-success col-md-4" data-toggle="modal" data-target="#addingrediente" title="Agragar ingrediente">
                            <i class="bi-arrow-return-right"></i>
                        </button>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ categorías</label><br>
                        <a  href="/categorias" type="submit" class="btn btn-success col-md-4" title="Agragar categorías">
                            <i class="bi-arrow-return-right"></i>
                        </a>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ producto</label><br>
                        <a  href="/productos"type="submit" class="btn btn-success col-md-4" title="Agragar productos">
                            <i class="bi-arrow-return-right"></i>
                        </a>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<div class="row col-12  mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Lista Ingredientes</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Ingrediente
            </th>
            <th>
                Stock
            </th>
            <th>
                Descripción
            </th>
            <th>
                Productos
            </th>
            <th>
                Estado
            </th>
            <th>
                Acción
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($ingredientes as $ingrediente )
            <tr>
                <td>
                    {{$ingrediente->ingrediente}}
                </td>
                <td>
                    {{$ingrediente->stock}}
                </td>
                <td>
                    {{$ingrediente->descripcionin}}
                </td>
                <td>
                    @foreach($detalleingredientes as $detalle)
                        @if($detalle->ingrediente_id==$ingrediente->id)
                            {{$detalle->producto->nombre}}
                                <button type="button" class="btn-sm btn-danger " title="Desasociar producto" wire:click="destroy({{$detalle->id}})" >
                                   <i class="bi-scissors text-white"></i>
                                </button><br>
                        @endif
                    @endforeach
                </td>
                <td>
                    {{$ingrediente->estado}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editingrediente" title="Editar ingrediente" wire:click="edit({{$ingrediente->id}})" >
                        <i class="bi-pencil-fill text-white"></i>
                    </button>
                    <button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#addasociar" title="Asignar producto" wire:click="formasociar({{$ingrediente->id}})" >
                        <i class="bi-arrow-return-right text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$ingredientes->links()}}
</div>
