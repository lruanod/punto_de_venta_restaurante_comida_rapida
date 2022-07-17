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

                    <div class="col-md-3">

                        <div class="row form-group">
                            <label for="buscar" class="text-white">Nombre del cliente</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control col-md-3">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ clientes</label><br>
                        <button type="button" class="btn btn-success col-md-4" data-toggle="modal" data-target="#addcliente" title="Agragar cliente">
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
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editcliente" title="Editar cliente" wire:click="edit({{$cliente->id}})" >
                        <i class="bi-pencil-fill text-white"></i>
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
