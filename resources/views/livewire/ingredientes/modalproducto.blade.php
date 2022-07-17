<!-- modal buscarcliente-->
<div wire:ignore.self class="modal fade bd-example-modal-lg" id="producto" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title " id="producto">Buscar producto</h5>
                <button class="close col-md-1 btn btn-danger" id="cerrarin" data-dismiss="modal" aria-label="Close" >
                   <i class="bi-backspace-reverse text-white"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="container col-sm-12">
                    <div class="card" >
                        <div class="card-body">
                            @include('livewire.ingredientes.productolista')
                            <br>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- modal buscarcliente-->
