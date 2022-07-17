<div class="col-md-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Productos</h4>
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
                            <label for="buscar" class="text-white col-md-12">Nombre del producto</label>
                            <input type="text" placeholder="buscar"  wire:model="buscarproducto" class="form-control col-md-3">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="row col-12  mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Lista Productos</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Producto
            </th>
            <th>
                Precio
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
        @foreach($productos as $producto)
            <tr>
                <td>
                    {{$producto->nombre}}
                </td>
                <td>
                    {{$producto->precio}}
                </td>
                <td>
                    {{$producto->descripcion}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  title="asignar producto" wire:click="asignarproducto({{$producto->id}})" >
                        <i class="bi-check text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <br>
    {{$productos->links()}}
</div>
