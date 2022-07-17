<div class="col-md-12 mt-3">
    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #07459F );" >
        <h4 class="text-center text-white">Pagos</h4>
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
                        <label  class="text-white">+ pedidos</label><br>
                        <a  href="/pedidos" type="submit" class="btn btn-success col-md-4" title="Registrar pedidos">
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
        <h4 class="text-center text-white">Lista pedidos</h4>
    </div><br>
    <div class="table-responsive">
        <table class="table table-striped">
        <thead>
        <tr>
            <th>
                #
            </th>
            <th>
                Fecha
            </th>
            <th>
                Usuario
            </th>
            <th>
                Referencia
            </th>
            <th>
                Estado
            </th>
            <th>
                Descuento
            </th>
            <th>
                Total
            </th>
            <th>
                Acción
            </th>

        </tr>
        </thead>
        <tbody>
        @foreach($pedidos as $pedido)
            <tr>
                <td>
                    {{$pedido->id}}
                </td>
                <td>
                    {{\carbon\carbon::parse($pedido->fechapedido)->format('d/m/Y')}}
                </td>
                <td>
                    {{$pedido->usuario->nombre}}
                </td>
                <td>
                    {{$pedido->referencia}}
                </td>
                <td>
                    {{$pedido->estado}}
                </td>
                <td>
                    {{$pedido->descuento}}
                </td>
                <td>
                    {{$pedido->total}}
                </td>
                <td>
                    <button type="button" class="btn btn-info"  data-toggle="modal" data-target="#addpago" title="Pagar" wire:click="pagoform({{$pedido->id}})" >
                        <i class="bi-pencil-fill text-white"></i>
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <div class="row col-12  mt-3">
        {{$pedidos->links()}}
    </div>

</div>
