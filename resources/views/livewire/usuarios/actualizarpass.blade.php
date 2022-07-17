<!-- form login-->
                <div class="container col-md-6 mt-3>
                    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #1B92F0 );">
                        <div class="card-header text-center text-white">
                            Actualizar contraseña
                        </div>
                        <div class="card-body">
                            @include('livewire.usuarios.formactualizarpass')
                            <br>
                            <div class="row form-group ">
                                    @if(!empty(session('usuario')))
                                      <button wire:click="actualizar" class="btn btn-danger col-md-5">Actualizar</button>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
<!-- form login-->
