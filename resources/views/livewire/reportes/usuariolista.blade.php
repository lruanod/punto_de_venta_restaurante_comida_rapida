<div class="col-md-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Usuarios</h4>
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
                            <label for="buscar" class="text-white col-md-12">Nombre del usuario</label>
                            <input type="text" placeholder="buscar"  wire:model="buscarusuario" class="form-control col-md-3">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row col-12  mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Lista Usuarios</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Nombre
            </th>
            <th>
                Usuario
            </th>
            <th>
                Rol
            </th>
            <th>
                Acción
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>
                    {{$usuario->nombre}}
                </td>
                <td>
                    {{$usuario->usuario}}
                </td>
                <td>
                    {{$usuario->rol}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  title="asignar usuario" wire:click="asignarusuario({{$usuario->id}})" >
                        <i class="bi-check text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$usuarios->links()}}
</div>
