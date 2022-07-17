<?php

namespace App\Http\Livewire;


use App\Exports\EntradaExport;
use App\Exports\EntradausuarioExport;
use App\Models\Entrada;
use App\Models\Ingrediente;
use App\Models\Usuario;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class ReporteentradaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $inicio,$fin, $usuario, $usuario_id,$ingrediente,$ingrediente_id;
    public $buscaringrediente, $buscarusuario;


    public function getIngredientesProperty(){
        $busqueda='%'.$this->buscaringrediente.'%';
        return Ingrediente::where('ingrediente','like',$busqueda)->paginate(8,['*'],'ingrediente');
    }

    public function getUsuariosProperty(){
        $busqueda='%'.$this->buscarusuario.'%';
        return Usuario::where('nombre','like',$busqueda)->paginate(8,['*'],'usuario');
    }
    public function render()
    {
        return view('livewire.reporteentrada-component',[
            'ingredientes' => $this->getIngredientesProperty(),
            'usuarios' => $this->getUsuariosProperty()
        ]);
    }

    public function asignaringrediente($id){

        $ingrediente= Ingrediente::find($id);
        $this->ingrediente= $ingrediente->ingrediente;
        $this->ingrediente_id= $ingrediente->id;
        $this->usuario='';
        $this->usuario_id='';
        $this->msjingrediente();
        $this->resetPage();
    }

    public function asignarusuario($id){
        $usuario= Usuario::find($id);
        $this->usuario= $usuario->nombre;
        $this->usuario_id= $usuario->id;
        $this->ingrediente= '';
        $this->ingrediente_id= '';
        $this->msjusuario();
        $this->resetPage();
    }

    public function rsinfiltro()
    {
        $this->validate([
            'inicio'=> 'required|date',
            'fin'=> 'required|date'
        ]);
        $inicio=$this->inicio;
        $fin=$this->fin;

        if($this->ingrediente_id){
            $entradas=Entrada::whereBetween('fecha',array($this->inicio,$this->fin))->where('ingrediente_id','=',$this->ingrediente_id)->orderBy("created_at", "desc")->get();
            $this->default();
            $pdf = PDF::loadView('livewire.reportes.Rentrada', compact('entradas','inicio','fin'))->setPaper('letter','landscape')->output();
            set_time_limit(600);
            return response()->streamDownload(
                fn () => print($pdf),
                "Reporte_entrdas ".now().".pdf"
            );
        }
        if($this->usuario_id){
            $entradas=Entrada::whereBetween('fecha',array($this->inicio,$this->fin))->where('usuario_id','=',$this->usuario_id)->orderBy("created_at", "desc")->get();
            $this->default();
            $pdf = PDF::loadView('livewire.reportes.Rentrada', compact('entradas','inicio','fin'))->setPaper('letter','landscape')->output();
            set_time_limit(600);
            return response()->streamDownload(
                fn () => print($pdf),
                "Reporte_entradas ".now().".pdf"
            );
        }

        if(empty($this->usuario_id)&&empty($this->ingrediente_id)){
            $entradas=Entrada::whereBetween('fecha',array($this->inicio,$this->fin))->orderBy("created_at", "desc")->get();
            $this->default();
            $pdf = PDF::loadView('livewire.reportes.Rentrada', compact('entradas','inicio','fin'))->setPaper('letter','landscape')->output();
            set_time_limit(600);
            return response()->streamDownload(
                fn () => print($pdf),
                "Reporte_entradas ".now().".pdf"
            );
        }
    }
    public  function rsinfiltroxls(){
        $this->validate([
            'inicio'=> 'required|date',
            'fin'=> 'required|date'
        ]);

        $inicio=$this->inicio;
        $fin=$this->fin;

        if($this->ingrediente_id) {
            $ingrediente_id = $this->ingrediente_id;
            $this->default();
            return (new EntradaExport($inicio, $fin, $ingrediente_id))->download('Reporte de entradas.xlsx');
        }
        if($this->usuario_id) {
            $usuario_id = $this->usuario_id;
            $this->default();
            return (new EntradausuarioExport($inicio, $fin, $usuario_id))->download('Reporte de entradas.xlsx');
        }
        if(empty($this->usuario_id)&&empty($this->ingrediente_id)){
            $ingrediente_id = $this->ingrediente_id;
            $this->default();
            return (new EntradaExport($inicio, $fin, $ingrediente_id))->download('Reporte de entradas.xlsx');
        }
    }

    public function msjusuario(){
        $this->dispatchBrowserEvent('alert',['message'=>'usuario asignado']);
    }
    public function msjingrediente(){
        $this->dispatchBrowserEvent('alert',['message'=>'ingrediente asignado']);
    }

    public  function default(){
        $this->inicio='';
        $this->fin='';
        $this->ingrediente='';
        $this->ingrediente_id='';
        $this->usuario_id='';
        $this->usuario='';
    }
}
