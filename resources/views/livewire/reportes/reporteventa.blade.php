
<!-- form sin filtro-->
    <div class="col-md-5">
                <div class="justify-content-center>
                    <div class="card" style="background: linear-gradient(to bottom, #3C3E40  , #1B92F0 );">
                        <div class="card-header text-center text-white">
                            Reporte de ventas
                        </div>
                        <div class="card-body">
                            @include('livewire.reportes.formreporteventa')
                            <br>
                            <div class="row form-group ">
                                <label for="pdf" class="text-white">Reporte PDF</label><br>
                                <button  class="btn btn-danger col-md-2" title="Generar PDF" wire:click="rsinfiltro()">
                                    <i class="bi-file-earmark-pdf"></i>
                                </button> &nbsp; &nbsp;
                            </div>
                            <div class="row form-group ">
                                <label for="pdf" class="text-white">Reporte Excel</label><br>
                                <button type="submit"  class="btn btn-success col-md-2" title="Generar excel" wire:click="rsinfiltroxls()">
                                    <i class="bi-file-earmark-spreadsheet"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
<!-- form sin filtro-->











