

<div class="row form-group">
    <label for="nombre" class="col-5 text-white">Nombre</label>
    <input type="text"  class="form-control col-md-5" wire:model="nombre">
    @error('nombre') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="usuario" class="col-5 text-white">Usuario</label>
    <input type="text" class="form-control col-md-5" wire:model="usuario">
    @error('usuario') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="pass" class="col-5 text-white">Contraseña</label>
    <input type="password" class="form-control col-md-5" wire:model="pass">
    @error('pass') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="" class="col-5 text-white" >Perfil</label>
    <select class="form-control col-md-5" wire:model="rol">
        <option value="">Seleccionar perfil</option>
        <option value="Vendedor">Vendedor</option>
        <option value="Mesero">Mesero</option>
        <option value="Cocinero">Cocinero</option>
        <option value="Administrador">Administrador</option>
    </select>
    @error('rol') <span class="text-warning">{{$message}}</span> @enderror
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









