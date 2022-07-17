<div class="col-md-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Clientes</h4>
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

                    <div class="col-md-4">

                        <div class="row form-group">
                            <label for="buscar" class="text-white">Nombre del cliente</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control col-md-3">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row col-12  mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Lista Clientes</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Nombre
            </th>
            <th>
                Dirección
            </th>
            <th>
                NIT
            </th>
            <th>
                Acción
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($clientes as $cliente)
            <tr>
                <td>
                    {{$cliente->nombre}}
                </td>
                <td>
                    {{$cliente->direccion}}
                </td>
                <td>
                    {{$cliente->nit}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  title="asignar cliente" wire:click="asignarcliente({{$cliente->id}})" >
                        <i class="bi-check text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$clientes->links()}}
</div>
