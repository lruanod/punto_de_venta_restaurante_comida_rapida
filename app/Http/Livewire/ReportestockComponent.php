<?php

namespace App\Http\Livewire;


use App\Models\Categoria;
use App\Models\Detalleingrediente;
use App\Models\Ingrediente;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class ReportestockComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $inicio,$fin, $categoria, $categoria_id,$producto,$producto_id, $ingrediente,$ingrediente_id;
    public $buscarproducto, $buscarcategoria, $buscaringrediente;


    public function getProdcutosProperty(){
        $busqueda='%'.$this->buscarproducto.'%';
        return Producto::where('nombre','like',$busqueda)->paginate(8,['*'],'producto');
    }

    public function getIngredientesProperty(){
        $busqueda='%'.$this->buscaringrediente.'%';
        return Ingrediente::where('ingrediente','like',$busqueda)->paginate(8,['*'],'ingrediente');
    }


    public function getCategoriasProperty(){
        $busqueda='%'.$this->buscarcategoria.'%';
        return Categoria::where('categoria','like',$busqueda)->paginate(8,['*'],'categoria');
    }
    public function render()
    {
        return view('livewire.reportestock-component',[
            'productos' => $this->getProdcutosProperty(),
            'ingredientes' => $this->getIngredientesProperty(),
            'categorias' => $this->getCategoriasProperty()
        ]);
    }

    public function asignarproducto($id){
        $producto= Producto::find($id);
        $this->producto= $producto->nombre;
        $this->producto_id= $producto->id;
        $this->categoria='';
        $this->categoria_id='';
        $this->ingrediente= '';
        $this->ingrediente_id= '';
        $this->msjproducto();
        $this->resetPage();
    }

    public function asignaringrediente($id){
        $ingrediente=Ingrediente::find($id);
        $this->ingrediente= $ingrediente->ingrediente;
        $this->ingrediente_id= $ingrediente->id;
        $this->categoria_id='';
        $this->categoria_id='';
        $this->producto= '';
        $this->producto_id= '';
        $this->msjingrediente();
        $this->resetPage();
    }

    public function asignarcategoria($id){
        $categoria= Categoria::find($id);
        $this->categoria= $categoria->categoria;
        $this->categoria_id= $categoria->id;
        $this->producto= '';
        $this->producto_id= '';
        $this->ingrediente= '';
        $this->ingrediente_id= '';
        $this->msjcategoria();
        $this->resetPage();
    }

    public function rsinfiltro()
    {

        if($this->producto_id){
            $productos=Producto::where('id','=',$this->producto_id)->orderBy("created_at", "desc")->get();
            $detalles = Detalleingrediente::join('productos','producto_id','productos.id')->where('producto_id', '=', $this->producto_id)->get();
            $this->default();
            $pdf = PDF::loadView('livewire.reportes.Rstock', compact('productos','detalles'))->setPaper('letter','landscape')->output();
            set_time_limit(600);
            return response()->streamDownload(
                fn () => print($pdf),
                "Reporte_stock ".now().".pdf"
            );
        }
        if($this->categoria_id){
            $productos=Producto::where('categoria_id','=',$this->categoria_id)->orderBy("created_at", "desc")->get();
            $detalles = Detalleingrediente::join('productos','producto_id','productos.id')->get();
            $this->default();
            $pdf = PDF::loadView('livewire.reportes.Rstock', compact('productos','detalles'))->setPaper('letter','landscape')->output();
            set_time_limit(600);
            return response()->streamDownload(
                fn () => print($pdf),
                "Reporte_stock ".now().".pdf"
            );
        }

        if(empty($this->categoria_id)&&empty($this->producto_id)){
            $productos=Producto::orderBy("created_at", "desc")->get();
            $detalles = Detalleingrediente::join('productos','producto_id','productos.id')->get();
            $this->default();
            $pdf = PDF::loadView('livewire.reportes.Rstock', compact('productos','detalles'))->setPaper('letter','landscape')->output();
            set_time_limit(600);
            return response()->streamDownload(
                fn () => print($pdf),
                "Reporte_stock ".now().".pdf"
            );
        }
    }

    public function rsinfiltro2()
    {

        if($this->ingrediente_id){
            $ingredientes=Ingrediente::where('id','=',$this->ingrediente_id)->orderBy("created_at", "desc")->get();
            $this->default();
            $pdf = PDF::loadView('livewire.reportes.Ringredientestock', compact('ingredientes'))->output();
            set_time_limit(600);
            return response()->streamDownload(
                fn () => print($pdf),
                "Reporte_stock ".now().".pdf"
            );
        }

        if(empty($this->ingrediente)){
            $ingredientes=Ingrediente::orderBy("created_at", "desc")->get();
            $this->default();
            $pdf = PDF::loadView('livewire.reportes.Ringredientestock', compact('ingredientes'))->setPaper('letter','landscape')->output();
            set_time_limit(600);
            return response()->streamDownload(
                fn () => print($pdf),
                "Reporte_stock ".now().".pdf"
            );
        }
    }

    public function msjcategoria(){
        $this->dispatchBrowserEvent('alert',['message'=>'categoría asignada']);
    }
    public function msjproducto(){
        $this->dispatchBrowserEvent('alertprod',['message'=>'producto asignado']);
    }
    public function msjingrediente(){
        $this->dispatchBrowserEvent('alert',['message'=>'ingrediente asignado']);
    }
    public  function default(){
        $this->inicio='';
        $this->fin='';
        $this->producto='';
        $this->producto_id='';
        $this->categoria_id='';
        $this->categoria='';
        $this->ingrediente='';
        $this->ingrediente_id='';

    }
}
