<!-- form login-->
                <div class="container col-md-6 mt-3>
                    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #1B92F0 );">
                        <div class="card-header text-center text-white">
                            Iniciar sesión
                        </div>
                        <div class="card-body">
                            @include('livewire.usuarios.formlogin')
                            <br>
                            <div class="row form-group ">
                                    @if(empty(session('usuario')))
                                      <button wire:click="login" class="btn btn-danger col-md-5">Ingresar</button>
                                    @endif
                                    @if(!empty(session('usuario')))
                                       <button wire:click="logout" class="btn btn-danger col-md-5">Cerrar sesion</button>
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>
<!-- form login-->
