<?php

namespace App\Http\Livewire;

use App\Exports\DetallecategoriasExport;
use App\Exports\DetalleusuariosExport;
use App\Exports\PagosExport;
use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Detalle;
use App\Models\Pago;
use App\Models\Usuario;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class ReporteventasComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $inicio,$fin, $cliente, $categoria, $cliente_id, $categoria_id, $identificador, $usuario, $usuario_id;
    public $buscar, $buscarcategoria, $buscarusuario;

    public function getClientesProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Cliente::where('nombre','like',$busqueda)->orwhere('nit','like',$busqueda)->paginate(8,['*'],'cliente');
    }

    public function getCategoriasProperty(){
        $busqueda='%'.$this->buscarcategoria.'%';
        return Categoria::where('categoria','like',$busqueda)->paginate(8,['*'],'categoria');
    }

    public function getUsuariosProperty(){
        $busqueda='%'.$this->buscarusuario.'%';
        return Usuario::where('nombre','like',$busqueda)->paginate(8,['*'],'usuario');
    }

    public function render()
    {
        return view('livewire.reporteventas-component',[
            'clientes' => $this->getClientesProperty(),
            'categorias' => $this->getCategoriasProperty(),
            'usuarios' => $this->getUsuariosProperty()
        ]);
    }

    public function rsinfiltro()
    {
        $this->validate([
            'inicio'=> 'required|date',
            'fin'=> 'required|date'
        ]);
        $inicio=$this->inicio;
        $fin=$this->fin;

       if($this->categoria_id){
           $pagos=Pago::whereBetween('fechapago',array($this->inicio,$this->fin))->orderBy("created_at", "desc")->get();
           $detalles = Detalle::join('productos','producto_id','productos.id')->where('productos.categoria_id', '=', $this->categoria_id)->whereBetween('detalles.created_at',array($inicio,$fin))->get();
           $total=$detalles->sum('subtotal');
           $descuento=$detalles->sum('descuento');
           $liquido=$total-$descuento;
           $this->default();
           $pdf = PDF::loadView('livewire.reportes.Rpagocategoria', compact('pagos','detalles','inicio','fin','total','descuento','liquido'))->setPaper('letter','landscape')->output();
           set_time_limit(600);
           return response()->streamDownload(
               fn () => print($pdf),
               "Reporte_ventas".now().".pdf"
           );
       }
       if($this->cliente_id){
           if($this->cliente_id){
               $pagos=Pago::whereBetween('fechapago',array($this->inicio,$this->fin))->where('cliente_id','=',$this->cliente_id)->orderBy("created_at", "desc")->get();

           } else{
               $pagos=Pago::whereBetween('fechapago',array($this->inicio,$this->fin))->orderBy("created_at", "desc")->get();
           }
           $this->default();
           $total=$pagos->sum('total');
           $descuento=$pagos->sum('descuento');
           $liquido=$total-$descuento;
           $detalles=Detalle::all();
           $this->default();
           $pdf = PDF::loadView('livewire.reportes.Rpago', compact('pagos','detalles','inicio','fin','total','descuento','liquido'))->output();
           set_time_limit(600);
           return response()->streamDownload(
               fn () => print($pdf),
               "Reporte_ventas".now().".pdf"
           );
       }

        if($this->usuario_id){
            if($this->usuario_id){
                $pagos=Pago::whereBetween('fechapago',array($this->inicio,$this->fin))->where('usuario_id','=',$this->usuario_id)->orderBy("created_at", "desc")->get();

            } else{
                $pagos=Pago::whereBetween('fechapago',array($this->inicio,$this->fin))->orderBy("created_at", "desc")->get();
            }
            $this->default();
            $total=$pagos->sum('total');
            $descuento=$pagos->sum('descuento');
            $liquido=$total-$descuento;
            $detalles=Detalle::all();
            $this->default();
            $pdf = PDF::loadView('livewire.reportes.Rpago', compact('pagos','detalles','inicio','fin','total','descuento','liquido'))->output();
            set_time_limit(600);
            return response()->streamDownload(
                fn () => print($pdf),
                "Reporte_ventas".now().".pdf"
            );
        }

        if(empty($this->cliente_id)&&empty($this->usuario_id)&&empty($this->categoria_id)){
            $pagos=Pago::whereBetween('fechapago',array($this->inicio,$this->fin))->orderBy("created_at", "desc")->get();
            $this->default();
            $total=$pagos->sum('total');
            $descuento=$pagos->sum('descuento');
            $liquido=$total-$descuento;
            $detalles=Detalle::all();
            $this->default();
            $pdf = PDF::loadView('livewire.reportes.Rpago', compact('pagos','detalles','inicio','fin','total','descuento','liquido'))->output();
            set_time_limit(600);
            return response()->streamDownload(
                fn () => print($pdf),
                "Reporte_ventas".now().".pdf"
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
        if($this->cliente_id) {
            $cliente_id = $this->cliente_id;
            $this->default();
            return (new PagosExport($inicio, $fin, $cliente_id))->download('Reporte de ventas.xlsx');
        }
        if($this->categoria_id) {
            $categoria_id = $this->categoria_id;
            $this->default();
            return (new DetallecategoriasExport($inicio, $fin, $categoria_id))->download('Reporte de ventas.xlsx');
        }
        if($this->usuario_id) {
            $usuario_id = $this->usuario_id;
            $this->default();
            return (new DetalleusuariosExport($inicio, $fin, $usuario_id))->download('Reporte de ventas.xlsx');
        }
        if(empty($this->cliente_id)&&empty($this->usuario_id)&&empty($this->categoria_id)){
            $cliente_id = $this->cliente_id;
            $this->default();
            return (new PagosExport($inicio, $fin, $cliente_id))->download('Reporte de ventas.xlsx');
        }
    }

    public function asignarcliente($id){
        $cliente= Cliente::find($id);
        $this->cliente= $cliente->nombre;
        $this->cliente_id= $cliente->id;
        $this->usuario='';
        $this->usuario_id='';
        $this->categoria= '';
        $this->categoria_id= '';
        $this->msjcliente();
        $this->resetPage();
    }
    public function asignarcategoria($id){
        $categoria= Categoria::find($id);
        $this->categoria= $categoria->categoria;
        $this->categoria_id= $categoria->id;
        $this->usuario='';
        $this->usuario_id='';
        $this->cliente_id='';
        $this->cliente='';
        $this->msjcategoria();
        $this->resetPage();
    }

    public function asignarusuario($id){
        $usuario= Usuario::find($id);
        $this->usuario= $usuario->nombre;
        $this->usuario_id= $usuario->id;
        $this->categoria= '';
        $this->categoria_id= '';
        $this->cliente_id='';
        $this->cliente='';
        $this->msjusuario();
        $this->resetPage();
    }

    public function msjusuario(){
        $this->dispatchBrowserEvent('alert',['message'=>'usuario asignado']);
    }
    public function msjcategoria(){
        $this->dispatchBrowserEvent('alert',['message'=>'categoría asignada']);
    }
    public function msjcliente(){
        $this->dispatchBrowserEvent('alert',['message'=>'cliente asignado']);
    }
    public  function default(){
        $this->inicio='';
        $this->fin='';
        $this->cliente='';
        $this->cliente_id='';
        $this->categoria='';
        $this->categoria_id='';
        $this->usuario_id='';
        $this->usuario='';
    }

}
