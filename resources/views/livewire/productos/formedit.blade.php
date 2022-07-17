

<div class="row form-group">
    <label for="nombre" class="col-5 text-white">Nombre del producto</label>
    <input type="text"  class="form-control col-md-5" wire:model="nombre">
    @error('nombre') <span>{{$message}}</span> @enderror
</div>
<div class="row form-group">
    <label for="precio" class="col-5 text-white">Precio</label>
    <input type="number" wire:model="precio" placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7">
    @error('precio') <span>{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="descripcion" class="col-5 text-white">Descripción</label>
    <textarea class="form-control" wire:model="descripcion"  rows="3"></textarea>
    @error('descripcion') <span>{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="url" class="col-5 text-white">Imagen</label>
    <input type="file" class="form-control col-md-5" wire:model="url2" id="{{$identificador2}}">
    @error('url2') <span>{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="precio" class="col-5 text-white">Descuento</label>
    <input type="number" wire:model="descuento" value="0"  placeholder="0.00"  min="0" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" onblur="this.parentNode.parentNode.style.backgroundColor=/^\d+(?:\.\d{1,2})?$/.test(this.value)?inherit':'red'" class="form-control col-md-7">
    @error('descuento') <span>{{$message}}</span> @enderror
</div>


<div class="row form-group">
    <label for="" class="col-5 text-white" >Categoría</label>
    <select class="form-control col-md-5" wire:model="categoria_id">
        <option value="">Seleccionar Categoría</option>
        @foreach($categorias as $categoria)
            <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
        @endforeach
    </select>
    @error('categoria_id') <span>{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="" class="col-5 text-white" >Estado</label>
    <select class="form-control col-md-5" wire:model="estado">
        <option value="">Seleccionar Estado</option>
        <option value="Habilitado">Habilitado</option>
        <option value="Deshabilitado">Deshabilitado</option>
    </select>
    @error('estado') <span>{{$message}}</span> @enderror
</div>

<div class="card-body align-content-center">
    <div wire:loading wire:target="url2" class="alert alert-danger">
        <ul>
                <li>Espere un momento hasta que la imagen se haya cargado</li>
        </ul>
    </div>

    @if ($url2)
        <label  class="text-white align-content-center" >Pre visualización</label><br>
        <img class="rounded" src="{{$url2->temporaryUrl()}}" width="250vw" height="150vh" >
        <br>
    @endif
    @if ($url3)
        <label  class="text-white align-content-center" >Imagen actual</label><br>
        <img class="rounded" src="{{asset("storage/$url3")}}" width="250vw" height="150vh" >
    @endif
</div> <br>







