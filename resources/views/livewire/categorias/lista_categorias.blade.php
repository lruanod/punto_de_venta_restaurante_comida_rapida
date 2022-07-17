<div class="col-md-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Categorías</h4>
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
                            <label for="buscar" class="text-white">Nombre de la categoría</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control col-md-3">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ categoría</label><br>
                        <button type="button" class="btn btn-success col-md-4" data-toggle="modal" data-target="#addcategoria" title="Agragar categoría">
                            <i class="bi-arrow-return-right"></i>
                        </button>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ ingredientes</label><br>
                        <a  href="/ingredientes" type="submit" class="btn btn-success col-md-4" title="Agragar ingredientes">
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
        <h4 class="text-center text-white">Lista Categorías</h4>
    </div><br>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Nombre de la categoría
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
        @foreach($categorias as $categoria)
            <tr>
                <td>
                    {{$categoria->categoria}}
                </td>
                <td>
                    {{$categoria->estado}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editcategoria" title="Editar categoría" wire:click="edit({{$categoria->id}})" >
                        <i class="bi-pencil-fill text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <br>
    {{$categorias->links()}}
</div>
