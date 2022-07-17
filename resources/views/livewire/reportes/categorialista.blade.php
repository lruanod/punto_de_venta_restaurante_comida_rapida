<div class="col-md-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Categorias</h4>
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
                            <label for="buscar" class="text-white col-md-12">Nombre del la categoría</label>
                            <input type="text" placeholder="buscar"  wire:model="buscarcategoria" class="form-control col-md-3">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row col-12  mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Lista Categorias</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Categoría
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
                    <button type="button" class="btn btn-info"  title="asignar categoría" wire:click="asignarcategoria({{$categoria->id}})" >
                        <i class="bi-check text-white"></i>
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
