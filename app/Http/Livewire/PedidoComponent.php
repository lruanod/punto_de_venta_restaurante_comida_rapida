<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Cliente;
use App\Models\Detalle;
use App\Models\Detalleingrediente;
use App\Models\Detalleproducto;
use App\Models\Ingrediente;
use App\Models\Pedido;
use App\Models\Producto;
use App\Models\Usuario;
use Livewire\Component;
use Livewire\Response;
use Livewire\WithPagination;
use Session;
use PDF;


class PedidoComponent extends Component
{

    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $pedido_id,$referencia,$cantidad,$precio,$descuento,$subtotal,$observacion,$producto_id,$nombre,$identificador,$detalle_id,$tdescuento,$total;
    public $buscar, $errorstock;

    public function  mount(){
        $this->identificador = rand();
        $detalle= Detalle::where('pedido_id','=',session()->get('pedido_id'))->get();
        $this->total=$detalle->sum('subtotal');
        $this->tdescuento=$detalle->sum('descuento');
    }
    public function totales(){
        $detalle= Detalle::where('pedido_id','=',session()->get('pedido_id'))->get();
        $this->total=$detalle->sum('subtotal');
        $this->tdescuento=$detalle->sum('descuento');
    }
    public function  change(){
        if(!empty($this->cantidad)){
            $producto= Producto::find($this->producto_id);
            $this->subtotal = ($this->cantidad*$producto->precio)-$this->descuento;
        } else{
            $this->subtotal= '';
        }
    }


    public function getProductosProperty(){
        $busqueda='%'.$this->buscar.'%';

        return Producto::where('nombre','like',$busqueda)->orwhere('categoria_id','like',$busqueda)->paginate(8,['*'],'producto');
    }



    public function render()
    {
        return view('livewire.pedido-component',[
            'categorias' => Categoria::all(),
            'productos' => $this->getProductosProperty(),
            'detalleproductos' => Detalleproducto::where('detalle_id','=',$this->detalle_id)->paginate(8,['*'],'detalleproducto'),
            'detalles' => Detalle::where('pedido_id','=',session()->get('pedido_id'))->paginate(8,['*'],'detalle')
        ]);
    }

    public function store(){
        $this->validate([
            'referencia'=> 'required|string|max:300',
        ]);

        Pedido::create([
            'estado'=> 'Solicitado',
            'referencia'=> $this->referencia,
            'fechapedido'=> now(),
            'total'=> 0,
            'descuento'=> 0,
            'usuario_id'=> session()->get('usuario_id'),
        ]);

        $pedidos= Pedido::where('estado','=','Solicitado')->where('referencia','=',$this->referencia)->where('usuario_id','=',session()->get('usuario_id'))->get();
        foreach ( $pedidos as $pedido){
            session(['pedido_id'=>$pedido->id]);
        }
        $this->msjexitopedido();
        $this->default();
    }

    public function agregar(){
        $conerror=0;
        $this->validate([
            'cantidad'=> 'required|integer|min:0',
            'precio'=> 'required|numeric|min:0',
            'descuento'=> 'required|numeric|min:0',
            'subtotal'=> 'required|numeric|min:0',
            'observacion'=> 'string|max:250'
        ]);

        Detalle::create([
            'cantidad'=> $this->cantidad,
            'preciodetalle'=> $this->precio,
            'descuento'=> $this->descuento,
            'subtotal'=> $this->subtotal,
            'observacion'=> $this->observacion,
            'producto_id'=> $this->producto_id,
            'pedido_id'=> session()->get('pedido_id'),
        ]);
        $detalle= Detalle::where('pedido_id','=',session()->get('pedido_id'))->orderBy('id','desc')->first();
        $dproductos= Detalleingrediente::where('producto_id','=',$this->producto_id)->get();

        foreach ($dproductos as $det) {
            $ingrediente = Ingrediente::find($det->ingrediente_id);
            if ($ingrediente->stock < $this->cantidad) {
                $conerror=1;
                $this->errorstock='No hay suficiente '.$ingrediente->ingrediente.'para surtir la orden stock actual '.$ingrediente->stock;
                $this->msjerrorstock();
            }
        }

        if($conerror==0) {
            for ($i = 1; $i <= $detalle->cantidad; $i++) {
                foreach ($dproductos as $det) {
                    $ingrediente = Ingrediente::find($det->ingrediente_id);
                    Detalleproducto::create([
                        'detalle_id' => $detalle->id,
                        'producto_id' => $det->producto_id,
                        'ingrediente_id' => $det->ingrediente_id,
                        'numero' => 'Producto #' . $i,
                    ]);

                    $ingrediente->update([
                        'stock' => ($ingrediente->stock) - 1,
                    ]);


                }
            }
            $this->msjexitop();
            $this->default();
        } else{
            Detalle::destroy($detalle->id);
            $this->msjdelete();
        }
      $this->totales();
        $this->resetPage();
    }

    public function editproducto($id){
        $detalle= Detalle::find($id);
        $this->detalle_id=$detalle->id;
        $this->nombre=$detalle->producto->nombre;
        $this->cantidad=$detalle->cantidad;
        $this->precio=$detalle->preciodetalle;
        $this->descuento=$detalle->descuento;
        $this->subtotal=$detalle->subtotal;
        $this->observacion=$detalle->observacion;
        $this->producto_id=$detalle->producto_id;
    }

    public function updateproducto(){
        $conerror=0;
        $this->validate([
            'cantidad'=> 'required|integer|min:0',
            'precio'=> 'required|numeric|min:0',
            'descuento'=> 'required|numeric|min:0',
            'subtotal'=> 'required|numeric|min:0',
            'observacion'=> '|string|max:250'
        ]);
        // regresando la disponibilidad en estock
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
        $detalle->update([
            'cantidad'=> $this->cantidad,
            'preciodetalle'=> $this->precio,
            'descuento'=> $this->descuento,
            'subtotal'=> $this->subtotal,
            'observacion'=> $this->observacion,
            'producto_id'=> $this->producto_id,
            'pedido_id'=> session()->get('pedido_id'),
        ]);

        $detalle= Detalle::where('pedido_id','=',session()->get('pedido_id'))->orderBy('id','desc')->first();
        $dproductos= Detalleingrediente::where('producto_id','=',$this->producto_id)->get();

        foreach ($dproductos as $det) {
            $ingrediente = Ingrediente::find($det->ingrediente_id);
            if ($ingrediente->stock < $this->cantidad) {
                   $conerror=1;
                   $this->errorstock='No hay suficiente '.$ingrediente->ingrediente.' para surtir la orden stock actual '.$ingrediente->stock;
                   $this->msjerrorstock();
            }
        }

        if($conerror==0) {
            for ($i = 1; $i <= $detalle->cantidad; $i++) {
                foreach ($dproductos as $det) {
                    $ingrediente = Ingrediente::find($det->ingrediente_id);
                    Detalleproducto::create([
                        'detalle_id' => $detalle->id,
                        'producto_id' => $det->producto_id,
                        'ingrediente_id' => $det->ingrediente_id,
                        'numero' => 'Producto #' . $i,
                    ]);

                    $ingrediente->update([
                        'stock' => ($ingrediente->stock) - 1,
                    ]);


                }
            }
            $this->msjexitopu();
            $this->default();
        } else{
            Detalle::destroy($detalle->id);
            $this->msjdelete();
        }

        $this->totales();
        $this->resetPage();
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
           $this->msjeliminar();
       $this->totales();
   }

    public function edit(){
        if(!empty(session()->get('pedido_id'))){
            $id=session()->get('pedido_id');
            $pedido= Pedido::find($id);
            $this->referencia = $pedido->referencia;
        } else{
            $this->msjalerta();
        }
    }
    public function editingrediente($id){
       $this->detalle_id=$id;
    }
    public function destroyingrediente($id){
        $detalleproducto= Detalleproducto::find($id);
        $ingrediente= Ingrediente::find($detalleproducto->ingrediente_id);
        $ingrediente->update([
            'stock' => ($ingrediente->stock) + 1,
        ]);
        Detalleproducto::destroy($id);
        $this->msjdeleted();
    }
    public function detalle($id){
        $producto = Producto::find($id);
        $this->producto_id = $producto->id;
            if (!empty(session()->get('pedido_id'))) {
                $this->nombre = $producto->nombre;
                $this->precio = $producto->precio;
                $this->descuento = $producto->descuento;
               // $this->getdetelleingredientesProperty($this->producto_id);

            } else {
                $this->msjalerta();
            }
    }


    public function update(){
        $this->validate([
            'referencia'=> 'required|string|max:300',
        ]);
        $pedido= Pedido::find(session()->get('pedido_id'));
            $pedido->update([
                'referencia'=> $this->referencia,
            ]);


        $this->msjedit();
        $this->default();
    }

    public function Generarpedido(){

        $this->validate([
            'tdescuento'=> 'required|numeric|min:0',
            'total'=> 'required|numeric|min:1',
        ]);
        $pedido= Pedido::find(session()->get('pedido_id'));
        $pedido->update([
            'total'=> $this->total,
            'descuento'=> $this->tdescuento
        ]);

        $pedidos= Pedido::where('id','=',session()->get('pedido_id'))->get();
        $detalles=Detalle::where('pedido_id','=',session()->get('pedido_id'))->get();
        session(['pedido_id'=>'']);
        $this->default();
        $this->msjexitopdf();
        $this->resetPage();
        $this->redirect('/pedidos');
        $pdf = PDF::loadView('livewire.reportes.boletapedido', compact('pedidos','detalles'))->setPaper('letter','landscape')->output();
        set_time_limit(600);
        return response()->streamDownload(
            function () use ($pdf){
                echo $pdf;
            }, 'Boleta.pdf');


    }
    public function Cancelar(){
        $detalles= Detalle::where('pedido_id','=',session()->get('pedido_id'))->get();
        foreach ($detalles as $det) {
            $this->eliminarproducto($det->id);
            }
        Pedido::destroy(session()->get('pedido_id'));
        session(['pedido_id'=>'']);
        $this->default();
        $this->msjdeleted2();
        //$this->redirect('/pedidos');
        return redirect()->back();
    }
    public function default(){
        $this->referencia = '';
        //$this->producto_id='';
        $this->identificador = rand();

        $this->cantidad='';
        $this->precio='';
        $this->descuento='';
        $this->subtotal='';
        $this->observacion='';
        $this->errorstock='';
      //$this->total='';
      //$this->tdescuento='';

    }

    public function msjexitopedido(){
        $this->dispatchBrowserEvent('alertpedido',['message'=>'Pedido registrado correctamente']);
    }

    public function msjexitop(){
        $this->dispatchBrowserEvent('alertp',['message'=>'Detalle registrado correctamente']);
    }
    public function msjexitopdf(){
        $this->dispatchBrowserEvent('alertpdf',['message'=>'PDF generado']);
    }

    public function msjexitopu(){
        $this->dispatchBrowserEvent('alertpu',['message'=>'Detalle editado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Pedido editado correctamente']);
    }

    public function msjalerta(){
        $this->dispatchBrowserEvent('alert4',['message'=>'Crear el pedido primero']);
    }

    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Detalle eliminado no existe disponiblidad de ingredientes']);
    }

    public function msjeliminar(){
        $this->dispatchBrowserEvent('alert3',['message'=>'Detalle eliminado']);
    }

    public function msjerrorstock(){
        $this->dispatchBrowserEvent('alert3',['message'=>$this->errorstock]);
    }

    public function msjdeleted(){
        $this->dispatchBrowserEvent('alert3',['message'=>'ingrediente no incluido']);
    }
    public function msjdeleted2(){
        $this->dispatchBrowserEvent('alerteliminar',['message'=>'Pedido eliminado']);
    }


}
