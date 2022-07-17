<!-- modal ingrediente-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="editingrediente" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="editingrediente">Editar ingrediente</h5>
                <button wire:click="default" id="cerrar" class="close col-md-1 btn btn-danger" data-dismiss="modal" aria-label="Close">
                    <i class="bi-backspace-reverse text-white"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-10">
                    <div class="card" >
                        <div class="card-body">
                            @include('livewire.pedidos.ingredienteform')
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- modal ingrediente-->
