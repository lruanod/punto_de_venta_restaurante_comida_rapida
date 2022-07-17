<div class="col-md-12 mt-2">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Pedido</h4>
    </div>
</div>

<div class="col-md-10 mt-2">
    <div class=" row justify-content-center">
        <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );">
            <div class="card-header text-center text-white">
                Busqueda
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-md-3">

                        <div class="row form-group">
                            <label for="buscar" class="text-white">Producto</label>
                            <input type="text" placeholder="buscar"  wire:model="buscar" class="form-control col-md-3">
                        </div>

                        <div class="row form-group">
                            <label for="" class="col-5 text-white" >Categoría</label>
                            <select class="form-control col-md-5" wire:model="buscar">
                                <option value="">Seleccionar Categoría</option>
                                @foreach($categorias as $categoria)
                                    <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if(empty(session('pedido_id')))
                    <div class="col-md-2">
                        <label  class="text-white">+ Pedido</label><br>
                        <button type="button" class="btn btn-success col-md-4" data-toggle="modal" data-target="#addpedido" title="Agragar cliente">
                            <i class="bi-arrow-return-right"></i>
                        </button>
                    </div>
                    @endif
                    @if(!empty(session('pedido_id')))
                    <div class="col-md-2">
                        <label  class="text-white">+ Editar</label><br>
                        <a  type="submit" class="btn btn-success col-md-4" data-toggle="modal" data-target="#editpedido" wire:click="edit()" title="Editar pedido">
                            <i class="bi-arrow-return-right"></i>
                        </a>
                    </div>
                        <div class="col-md-2">
                            <label  class="text-white">+ Ver pedido</label><br>
                            <a   type="submit" class="btn btn-success col-md-4" data-toggle="modal" data-target="#verpedido"  title="Editar pedido">
                                <i class="bi-arrow-return-right"></i>
                            </a>
                        </div>


                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row col-12  mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Menu</h4>
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
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#adddetalle" id="btndetalle" title="Agragar" wire:click="detalle({{$producto->id}})" >
                        <i class="bi-cart-plus text-white"></i>
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
