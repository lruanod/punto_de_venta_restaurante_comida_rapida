
<div class="row form-group">
    <label for="stock" class="col-5 text-white">Fecha de ingreso</label>
    <input type="date" wire:model="fecha" class="form-control col-md-5">
    @error('fecha') <span class="text-warning">{{$message}}</span> @enderror
</div>


<div class="row form-group">
    <label for="" class="col-5 text-white" >Ingrediente</label>
    <select class="form-control col-md-5" wire:model="ingrediente_id" wire:change="change"  >
        <option value="">Seleccionar ingrediente</option>
        @foreach($ingredientes as $ingrediente)
            <option value="{{$ingrediente->id}}">{{$ingrediente->ingrediente}}&nbsp;Unidades disponibles:{{$ingrediente->stock}}</option>
        @endforeach
    </select>
    @error('ingrediente_id') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="stock" class="col-5 text-white">Unidades diponibles</label>
    <input type="number" wire:model="stock" class="form-control col-md-5"  placeholder="0"  min="0" readonly="readonly">
    @error('stock') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="stock" class="col-5 text-white">Ingreso de unidades</label>
    <input type="number" wire:model="stockentrada" class="form-control col-md-5"  placeholder="0"  min="0">
    @error('stockentrada') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="descripcion" class="col-5 text-white">Descripción</label>
    <textarea class="form-control" wire:model="descripcion"  rows="3"></textarea>
    @error('descripcion') <span class="text-warning">{{$message}}</span> @enderror
</div>








