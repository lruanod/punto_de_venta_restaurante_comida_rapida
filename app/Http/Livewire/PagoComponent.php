<?php

namespace App\Http\Livewire;

use App\Models\Cliente;
use App\Models\Detalle;
use App\Models\Detalleproducto;
use App\Models\Ingrediente;
use App\Models\Pago;
use App\Models\Pedido;
use Livewire\Component;
use Livewire\WithPagination;
use PDF;

class PagoComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $pedido_id,$total,$cambio,$efectivo,$descuento,$cliente_id,$nombrecliente,$direccion,$nit,$detalle_id;

    public $inicio,$fin,$buscar;
    public function getPedidosProperty(){
        if(!empty($this->inicio)&&!empty($this->fin)){

                return Pedido::where('estado','=','Solicitado')->whereBetween('fechapedido',array($this->inicio,$this->fin))->paginate(8,['*'],'pedido');

        } else{
                return Pedido::where('estado', '=','Solicitado')->orderBy("created_at", "desc")->paginate(8,['*'],'pedido');
        }
    }

    public function getClientesProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Cliente::where('nombre','like',$busqueda)->orwhere('nit','like',$busqueda)->paginate(8,['*'],'cliente');
    }

    public function render()
    {
        return view('livewire.pago-component',[
            'pedidos' => $this->getPedidosProperty(),
            'detalles' => Detalle::where('pedido_id', '=',$this->pedido_id)->get(),
            'clientes' => $this->getClientesProperty()
        ]);
    }
    public function  change(){
        if(!empty($this->efectivo)){
            $this->cambio = ($this->efectivo)-($this->total-$this->descuento);
        } else{
            $this->cambio= '';
        }
    }

    public function store(){
        $this->validate([
            'nombrecliente'=> 'required|string|max:75',
            'nit'=> 'required|string|max:12',
            'total'=> 'required|numeric|min:0',
            'efectivo'=> 'required|numeric|min:0',
            'cambio'=> 'required|numeric|min:0',
            'descuento'=> 'required|numeric|min:0'
        ]);
        Pago::create([
            'total'=> $this->total,
            'cambio'=> $this->cambio,
            'efectivo'=> $this->efectivo,
            'descuento'=> $this->descuento,
            'cliente_id'=> $this->cliente_id,
            'pedido_id'=> $this->pedido_id,
            'usuario_id'=> session()->get('usuario_id'),
            'fechapago'=> now()
        ]);
        $pedido= Pedido::find($this->pedido_id);
        $pedido->update([
            'estado'=> 'Pagado'
        ]);

        $pedidos= Pedido::where('id','=',$this->pedido_id)->get();
        $detalles=Detalle::where('pedido_id','=',$this->pedido_id)->get();
        $pagos=Pago::where('pedido_id','=',$this->pedido_id)->get();
        $this->msjexito();
        $this->default();
        $this->redirect('/pagos');
        $pdf = PDF::loadView('livewire.reportes.boletapago', compact('pedidos','detalles','pagos'))->setPaper('letter','landscape')->output();
        set_time_limit(600);
        return response()->streamDownload(
            function () use ($pdf){
                echo $pdf;
            }, 'BoletaPago.pdf');
    }

    public  function  eliminarproducto($id){
        // regresando la disponibilidad en estock
        $this->detalle_id=$id;
        $detalle= Detalle::find($this->detalle_id);
        $detalleproductos= Detalleproducto::where('detalle_id','=',$this->detalle_id)->get();
        foreach ($detalleproductos as $dproducto){
            $ingrediente= Ingrediente::find($dproducto->ingrediente_id);
            $ingrediente->update([
                'stock' => ($ingrediente->stock) + 1,
            ]);
            Detalleproducto::destroy($dproducto->id);
        }
        ///////
        Detalle::destroy($detalle->id);
    }
    public function Cancelar(){
        $detalles= Detalle::where('pedido_id','=',$this->pedido_id)->get();
        foreach ($detalles as $det) {
            $this->eliminarproducto($det->id);
        }
        Pedido::destroy($this->pedido_id);
        session(['pedido_id'=>'']);
        $this->default();
        $this->msjdeleted2();
        return redirect()->back();
    }
    public  function addcliente(){
        $this->validate([
            'nombrecliente'=> 'required|string|max:75',
            'direccion'=> 'required|string|max:100',
            'nit'=> 'required|string|max:12'
        ]);
        Cliente::create([
            'nombre'=> $this->nombrecliente,
            'direccion'=> $this->direccion,
            'nit'=> $this->nit
        ]);
        $this->msjexitoc();
        $this->default();
        $this->resetPage();
    }
    public function pagoform($id){
        $this->resetPage();
        $pedido= Pedido::find($id);
        $this->pedido_id=$pedido->id;
        $this->total=$pedido->total;
        $this->cambio=$pedido->cambio;
        $this->descuento=$pedido->descuento;
    }
    public function clienteform($id){
        $cliente= Cliente::find($id);
        $this->cliente_id=$cliente->id;
        $this->nombrecliente=$cliente->nombre;
        $this->nit=$cliente->nit;
        $this->msjexitocliente();
    }

    public function msjexitocliente(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Cliente agregado']);
    }
    public function msjexitoc(){
        $this->dispatchBrowserEvent('alertcliente',['message'=>'Cliente registrado']);
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alertpago',['message'=>'Pago registrado correctamente']);
    }
    public function msjdeleted2(){
        $this->dispatchBrowserEvent('alerteliminar2',['message'=>'Pedido eliminado']);
    }

    public function default(){
        $this->nombrecliente = '';
        $this->nit = '';
        $this->direccion = '';
        $this->pedido_id = '';
        $this->total="";
        $this->cambio="";
        $this->efectivo="";
        $this->descuento="";
        $this->cliente_id="";
        $this->buscar = '';
        $this->fin="";
        $this->inicio="";
    }

}
