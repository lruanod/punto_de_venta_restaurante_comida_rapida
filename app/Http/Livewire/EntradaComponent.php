<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Entrada;
use App\Models\Ingrediente;
use Livewire\Component;
use Livewire\WithPagination;
use phpDocumentor\Reflection\Types\Integer;

class EntradaComponent extends Component
{
  use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $entrada_id,$stock,$stockentrada,$descripcion,$fecha,$usuario_id,$ingrediente_id,$idstock,$bloquiaringrediente_id,$bloquiarstock;
    public $inicio,$fin;

    public function  change(){
        if(!empty($this->ingrediente_id)){
            $ingrediente= Ingrediente::find($this->ingrediente_id);
            $this->stock =$ingrediente->stock;
        } else{
            $this->stock= '';
            $this->ingrediente_id= '';
        }
    }

    public function getEntradasProperty(){
        if(!empty($this->inicio)&&!empty($this->fin)){
            return Entrada::whereBetween('fecha',array($this->inicio,$this->fin))->paginate(8,['*'],'entrada');
        } else{
            return Entrada::orderBy("created_at", "desc")->paginate(8,['*'],'entrada');
        }

    }
    public function render()
    {
        return view('livewire.entrada-component',[
            'entradas' => $this->getEntradasProperty(),
            'ingredientes'=> Ingrediente::all()
        ]);
    }
    public function store(){
        $this->validate([
            'stock'=> 'required|integer|min:0',
            'stockentrada'=> 'required|integer|min:0',
            'descripcion'=> 'required|string|max:300',
            'fecha'=> 'required|date',
            'ingrediente_id'=> 'required|integer'
        ]);

        Entrada::create([
            'stock'=> $this->stock,
            'stockentrada'=> $this->stockentrada,
            'descripcion'=> $this->descripcion,
            'fecha'=> $this->fecha,
            'usuario_id'=>  session()->get('usuario_id'),
            'ingrediente_id'=> $this->ingrediente_id
        ]);

        $ingrediente= Ingrediente::find($this->ingrediente_id);
        $ingrediente->update([
            'stock'=> $this->stockentrada+$ingrediente->stock
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $entrada= Entrada::find($id);
        $this->entrada_id = $entrada->id;
        $this->stock = $entrada->stock;
        $this->stockentrada = $entrada->stockentrada;
        $this->descripcion = $entrada->descripcion;
        $this->fecha = $entrada->fecha;
        $this->ingrediente_id = $entrada->ingrediente_id;
    }

    public function update(){
        $this->validate([
            'stock'=> 'required|integer|min:0',
            'stockentrada'=> 'required|integer|min:0',
            'descripcion'=> 'required|string|max:300',
            'fecha'=> 'required|date',
            'ingrediente_id'=> 'required|integer'
        ]);
        $ingrediente= Ingrediente::find($this->ingrediente_id);
        $ingrediente->update([
            'stock'=> $this->stock
        ]);
        $entrada= Entrada::find($this->entrada_id);
        $entrada->update([
            'stock'=> $this->stock,
            'stockentrada'=> $this->stockentrada,
            'descripcion'=> $this->descripcion,
            'fecha'=> $this->fecha,
            'usuario_id'=>  session()->get('usuario_id'),
        ]);
        $ingrediente= Ingrediente::find($this->ingrediente_id);
        $ingrediente->update([
            'stock'=> $this->stockentrada+$ingrediente->stock
        ]);
        $this->msjedit();
        $this->default();

    }

    public function default(){
        $this->stock = '';
        $this->stockentrada = '';
        $this->descripcion = '';
        $this->fecha = '';
        $this->usuario_id = '';
        $this->ingrediente_id = '';
        $this->inicio = '';
        $this->fin = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Entrada registrada correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Entrada editada correctamente']);
    }

}
