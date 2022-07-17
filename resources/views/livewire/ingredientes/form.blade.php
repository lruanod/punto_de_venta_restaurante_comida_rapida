

<div class="row form-group">
    <label for="ingrediente" class="col-5 text-white">Nombre del ingrediente</label>
    <input type="text"  class="form-control col-md-5" wire:model="ingrediente">
    @error('ingrediente') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="stock" class="col-5 text-white">Stock</label>
    <input type="number" wire:model="stock" class="form-control col-md-5"  placeholder="0"  min="0">
    @error('stock') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="descripcion" class="col-5 text-white">Descripción</label>
    <textarea class="form-control" wire:model="descripcion"  rows="3"></textarea>
    @error('descripcion') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="" class="col-5 text-white" >Estado</label>
    <select class="form-control col-md-5" wire:model="estado">
        <option value="">Seleccionar Estado</option>
        <option value="Habilitado">Habilitado</option>
        <option value="Deshabilitado">Deshabilitado</option>
    </select>
    @error('estado') <span class="text-warning">{{$message}}</span> @enderror
</div>









