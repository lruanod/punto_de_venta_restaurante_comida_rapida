<!-- modal buscarcliente-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="ingrediente" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="ingrediente">Buscar ingrediente</h5>
                <button class="close col-md-1 btn btn-danger" data-dismiss="modal" aria-label="Close" id="cerraringrediente">
                   <i class="bi-backspace-reverse text-white"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-12">
                    <div class="card" >
                        <div class="card-body">
                            @include('livewire.reportes.ingredientelista')
                            <br>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal buscarcliente-->
