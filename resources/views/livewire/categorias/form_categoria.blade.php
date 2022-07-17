
<div class="row form-group">
    <label for="" class="col-5 text-white">Nombre de la categoría</label>
    <input type="text" class="form-control col-md-5" wire:model="categoria">
    @error('categoria') <span class="text-warning">{{$message}}</span> @enderror
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





