
@if(empty(session('usuario')))
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
@endif

@if(!empty(session('usuario')))
    <div class="row form-group">
        <label for="usuario" class="col-5 text-white">Usuario</label>
        <input type="text" class="form-control col-md-5" value="{{session('usuario')}}" readonly="readonly" >
    </div>
@endif














