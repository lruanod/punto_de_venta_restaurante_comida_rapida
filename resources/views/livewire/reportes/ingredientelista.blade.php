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

                    <div class="col-md-5">

                        <div class="row form-group">
                            <label for="buscar" class="text-white col-md-12">Nombre del ingrediente</label>
                            <input type="text" placeholder="buscar"  wire:model="buscaringrediente" class="form-control col-md-3">
                        </div>
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
                Disponiblidad actual
            </th>
            <th>
                Descripción
            </th>
            <th>
                Acción
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($ingredientes as $ingrediente)
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
                    <button type="button" class="btn btn-info"  title="asignar categoría" wire:click="asignaringrediente({{$ingrediente->id}})" >
                        <i class="bi-check text-white"></i>
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
