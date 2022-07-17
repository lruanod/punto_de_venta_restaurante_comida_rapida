
<label  class="text-white">+ Buscar cliente</label><br>
<button type="button" class="btn-sm btn-success col-md-1" data-toggle="modal" data-target="#addbuscar" title="Agragar cliente">
    <i class="bi-arrow-return-right"></i>
</button>
<div class="row form-group">
    <label for="nombrecliente" class="col-5 text-white">Cliente</label>
    <input type="text"  class="form-control col-md-2" wire:model="nombrecliente" readonly="readonly">
    @error('nombrecliente') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="nit" class="col-5 text-white">NIT</label>
    <input type="text"  class="form-control col-md-5" wire:model="nit" readonly="readonly">
    @error('nit') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="nit" class="col-5 text-white">Detalle</label>
    <div class="table-responsive">
        <table class="table text-white">
            <thead>
            <tr>
                <th>
                    Cantidad
                </th>
                <th>
                    Producto
                </th>
                <th>
                    Descuento
                </th>
                <th>
                    Precio
                </th>
                <th>
                    Sub total
                </th>
            </tr>
            </thead>
            <tbody>
    @foreach($detalles as $detalle)
        <tr>
            <td>{{$detalle->cantidad}}</td>
            <td>{{$detalle->producto->nombre}}</td>
            <td>{{$detalle->descuento}}</td>
            <td>{{$detalle->preciodetalle}}</td>
            <td>{{$detalle->subtotal}}</td>
        </tr>
    @endforeach
            </tbody>
        </table>
    </div>
</div>

<div class="row form-group">
    <label for="total" class="col-5 text-white">Total</label>
    <input type="number" wire:model="total" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7" readonly="readonly">
    @error('total') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="total" class="col-5 text-white">Efectivo</label>
    <input type="number" wire:model="efectivo" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7" wire:change="change">
    @error('efectivo') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="cambio" class="col-5 text-white">Cambio</label>
    <input type="number" wire:model="cambio" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7" readonly="readonly">
    @error('cambio') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="descuento" class="col-5 text-white">Descuento</label>
    <input type="number" wire:model="descuento" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7" readonly="readonly">
    @error('descuento') <span class="text-warning">{{$message}}</span> @enderror
</div>








