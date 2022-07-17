


<div class="row form-group">
    <label for="pass" class="col-5 text-white">Contraseña actual</label>
    <input type="password" class="form-control col-md-5" wire:model="pass">
    @error('pass') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="pass2" class="col-5 text-white">Contraseña nueva</label>
    <input type="password" class="form-control col-md-5" wire:model="pass2">
    @error('pass2') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row form-group">
    <label for="pass3" class="col-5 text-white">Confirmar contraseña nueva</label>
    <input type="password" class="form-control col-md-5" wire:model="pass3">
    @error('pass3') <span class="text-warning">{{$message}}</span> @enderror
</div>












