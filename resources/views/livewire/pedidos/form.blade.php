
<div class="row form-group">
    <label for="descripcion" class="col-5 text-white">Referencia</label>
    <textarea class="form-control" wire:model="referencia"  rows="3"></textarea>
    @error('referencia') <span class="text-warning">{{$message}}</span> @enderror
</div>






