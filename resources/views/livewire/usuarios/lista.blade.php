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

                    <div class="col-md-3">

                        <div class="row form-group">
                            <label for="buscar" class="text-white">Nombre del usuario</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control col-md-3">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ usuario</label><br>
                        <button type="button" class="btn btn-success col-md-4" data-toggle="modal" data-target="#addusuario" title="Agragar usuario">
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
                Contraseña
            </th>
            <th>
                Perfil
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
        @foreach($usuarios as $usuario)
            <tr>
                <td>
                    {{$usuario->nombre}}
                </td>
                <td>
                    {{$usuario->usuario}}
                </td>
                <td>
                    {{$usuario->pass}}
                </td>
                <td>
                    {{$usuario->rol}}
                </td>
                <td>
                    {{$usuario->estado}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editusuario" title="Editar usuario" wire:click="edit({{$usuario->id}})" >
                        <i class="bi-pencil-fill text-white"></i>
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
