

<div class="row form-group">
    <label for="ingrediente" class="col-5 text-white">Nombre del ingrediente</label>
    <input type="text"  class="form-control col-md-5" wire:model="ingrediente">
    @error('ingrediente') <span>{{$message}}</span> @enderror
</div>


<div class="row form-group">
    <label for="descripcion" class="col-5 text-white">Descripción</label>
    <textarea class="form-control" wire:model="descripcion"  rows="3"></textarea>
    @error('descripcion') <span>{{$message}}</span> @enderror
</div>



<div class="row">
    <div class="col-md-7">
        <div class="row form-group">
            <label for="fin" class="col-5 text-white">Productos</label>
            <input type="text" class="form-control" wire:model="producto" readonly="readonly">
        </div>
    </div>
    <div class="col-md-5">
        <label  class="text-white">+ Buscar producto</label><br>
        <button class="btn-sm btn-info col-md-3 text-white" data-toggle="modal" data-target="#producto" title="Buscar Producto">
            <i class="bi-arrow-return-right"></i>
        </button>
    </div>
</div>










