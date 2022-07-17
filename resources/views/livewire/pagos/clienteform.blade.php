<div class="row form-group">
    <label for="nombrecliente" class="col-5 text-white">Nombre</label>
    <input type="text"  class="form-control col-md-5" wire:model="nombrecliente">
    @error('nombrecliente') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="direccion" class="col-5 text-white">Dirección</label>
    <input type="text" class="form-control col-md-5" wire:model="direccion">
    @error('direccion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="nit" class="col-5 text-white">NIT</label>
    <input type="text"  pattern="[0-9]+[-]+[0-9]"  class="form-control col-md-7" wire:model="nit">
    @error('nit') <span class="text-warning">{{$message}}</span> @enderror
</div>

