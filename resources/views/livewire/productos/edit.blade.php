<!-- modal buscarcliente-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="editproducto" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="editproducto">Editar Producto</h5>
                <button wire:click="default" id="cerrar"  class="close col-md-1 btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <i class="bi-backspace-reverse text-white"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-10">
                    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #1B92F0 );">
                        <div class="card-header text-center text-white">
                            Editar producto
                        </div>
                        <div class="card-body">
                            @include('livewire.productos.formedit')
                            <br>
                            <div class="row form-group ">
                                <button wire:click="update" wire:loading.attr="disabled" wire:target="url2"  class="btn btn-danger col-md-5">Actualizar</button>
                            </div>
                            <br>
                            <div class="row form-group ">
                                <button wire:click="default" class="btn btn-danger col-md-5" data-dismiss="modal" aria-label="Close">Cancelar</button>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal buscarcliente-->
