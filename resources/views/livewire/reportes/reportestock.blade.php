
<!-- form sin filtro-->
<div class="col-md-12">
    <div class="col-md-5">
                <div class="justify-content-center>
                    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #1B92F0 );">
                        <div class="card-header text-center text-white">
                            Reporte de disponibilidad
                        </div>
                        <div class="card-body">
                            @include('livewire.reportes.formreportestock')
                            <br>
                            <div class="row form-group ">
                                <label for="pdf" class="text-white">Reporte PDF</label><br>
                                <button  class="btn btn-danger col-md-2" title="Generar PDF" wire:click="rsinfiltro()">
                                    <i class="bi-file-earmark-pdf"></i>
                                </button> &nbsp; &nbsp;
                            </div>

                        </div>
                    </div>
                </div>
    </div>
<!-- form sin filtro-->


<!-- form sin filtro-->

<div class="col-md-5">
    <br>
    <div class="justify-content-center>
                    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #1B92F0 );">
    <div class="card-header text-center text-white">
        Reporte de disponibilidad ingredientes
    </div>
    <div class="card-body">
        @include('livewire.reportes.formreporteingredientestock')
        <br>
        <div class="row form-group ">
            <label for="pdf" class="text-white">Reporte PDF</label><br>
            <button  class="btn btn-danger col-md-2" title="Generar PDF" wire:click="rsinfiltro2()">
                <i class="bi-file-earmark-pdf"></i>
            </button> &nbsp; &nbsp;
        </div>

    </div>
</div>
</div>
</div>
<!-- form sin filtro-->
</div>










