

<div class="row form-group">
    <label for="incio" class="col-5 text-white">Fecha de inicio</label>
    <input type="date" class="form-control col-md-5" wire:model="inicio">
    @error('inicio') <span class="text-warning">{{$message}}</span> @enderror
</div>


<div class="row form-group">
    <label for="fin" class="col-5 text-white">Fecha de finalización</label>
    <input type="date" class="form-control col-md-5" wire:model="fin">
    @error('fin') <span class="text-warning">{{$message}}</span> @enderror
</div>

<div class="row">
    <div class="col-md-7">
        <div class="row form-group">
            <label for="fin" class="col-5 text-white">Categorias</label>
            <input type="text" class="form-control" wire:model="categoria" readonly="readonly">
        </div>
    </div>
    <div class="col-md-5">
        <label  class="text-white">+ Buscar categoria</label><br>
        <button class="btn-sm btn-info col-md-3 text-white" data-toggle="modal" data-target="#categoria" title="Buscar Caregoria">
            <i class="bi-arrow-return-right"></i>
        </button>
    </div>
</div>

<div class="row">
    <div class="col-md-7">
        <div class="row form-group">
            <label for="fin" class="col-5 text-white">Cliente</label>
            <input type="text" class="form-control" wire:model="cliente" readonly="readonly" >
        </div>
    </div>
    <div class="col-md-5">
        <label  class="text-white">+ Buscar cliente</label><br>
        <button class="btn-sm btn-info col-md-3 text-white" data-toggle="modal" data-target="#cliente" title="Buscar Cliente">
            <i class="bi-arrow-return-right"></i>
        </button>
    </div>
</div>

<div class="row">
    <div class="col-md-7">
        <div class="row form-group">
            <label for="fin" class="col-5 text-white">Operador</label>
            <input type="text" class="form-control" wire:model="usuario" readonly="readonly" >
        </div>
    </div>
    <div class="col-md-5">
        <label  class="text-white">+ Buscar operador</label><br>
        <button class="btn-sm btn-info col-md-3 text-white" data-toggle="modal" data-target="#usuario" title="Buscar Usuario">
            <i class="bi-arrow-return-right"></i>
        </button>
    </div>
</div>

















