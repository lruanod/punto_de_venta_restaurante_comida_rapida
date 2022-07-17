<div class="col-md-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Entradas</h4>
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
                            <label for="inicio" class="text-white">Fecha incio</label>
                            <input type="date" wire:model="inicio" class="form-control col-md-3">
                        </div>

                        <div class="row form-group">
                            <label for="final" class="text-white">Fecha final</label>
                            <input type="date" wire:model="fin" class="form-control col-md-3">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ entradas</label><br>
                        <button type="button" class="btn btn-success col-md-4" data-toggle="modal" data-target="#addentrada" title="Agragar entrada">
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
        <h4 class="text-center text-white">Lista Entradas</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Fecha
            </th>
            <th>
                Unidades disponibles antes de entrada
            </th>
            <th>
                Unidades ingresadas
            </th>
            <th>
                Descripción
            </th>
            <th>
                Usuario
            </th>
            <th>
                Ingrediente/producto
            </th>
            <th>
                Acción
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($entradas as $entrada)
            <tr>
                <td>
                    {{\carbon\carbon::parse($entrada->fecha)->format('d/m/Y')}}
                </td>
                <td>
                    {{$entrada->stock}}
                </td>
                <td>
                    {{$entrada->stockentrada}}
                </td>
                <td>
                    {{$entrada->descripcion}}
                </td>
                <td>
                    {{$entrada->usuario->usuario}}&nbsp;{{$entrada->usuario->nombre}}
                </td>
                <td>
                    {{$entrada->ingrediente->ingrediente}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editentrada" title="Editar entrada" wire:click="edit({{$entrada->id}})" >
                        <i class="bi-pencil-fill text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$entradas->links()}}
</div>
