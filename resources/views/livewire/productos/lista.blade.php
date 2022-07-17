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

                    <div class="col-md-3">

                        <div class="row form-group">
                            <label for="buscar" class="text-white">Nombre del producto</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control col-md-3">
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label  class="text-white">+ productos</label><br>
                        <button type="button" class="btn btn-success col-md-4" data-toggle="modal" data-target="#addproducto" title="Agragar producto">
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
                        <label  class="text-white">+ clientes</label><br>
                        <a  href="/clientes"type="submit" class="btn btn-success col-md-4" title="Agragar clientes">
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
        <h4 class="text-center text-white">Lista productos</h4>
    </div><br>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>
                Nombre
            </th>
            <th>
                Precio
            </th>
            <th>
                Descripción
            </th>
            <th>
                Imagen
            </th>
            <th>
                Descuento
            </th>
            <th>
                Estado
            </th>
            <th>
                Categoría
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
                    <img class="rounded" src="{{asset("storage/$producto->url")}}" alt="Generic placeholder image" width="100vw" height="60vh"  href="#">

                </td>
                <td>
                    {{$producto->descuento}}
                </td>
                <td>
                    {{$producto->estado}}
                </td>
                <td>
                    {{$producto->categoria->categoria}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#editproducto" title="Editar producto" wire:click="edit({{$producto->id}})" >
                        <i class="bi-pencil-fill text-white"></i>
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
