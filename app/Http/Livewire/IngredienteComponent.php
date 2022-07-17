<?php

namespace App\Http\Livewire;


use App\Models\Detalleingrediente;
use App\Models\Ingrediente;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;

class IngredienteComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $ingrediente_id,$ingrediente,$stock,$descripcion,$estado,$producto_id,$producto;
    public $buscar, $buscarproducto;

    public function getProdcutosProperty(){
        $busqueda='%'.$this->buscarproducto.'%';
        return Producto::where('nombre','like',$busqueda)->paginate(8,['*'],'producto');
    }

    public function getIngredientesProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Ingrediente::where('ingrediente','like',$busqueda)->orwhere('estado','like',$busqueda)->paginate(8,['*'],'ingrediente');
    }

    public function render()
    {
        return view('livewire.ingrediente-component',[
            'ingredientes' => $this->getIngredientesProperty(),
            'productos' => $this->getProdcutosProperty(),
            'detalleingredientes'=> Detalleingrediente::all()
        ]);
    }

    public function store(){
        $this->validate([
            'ingrediente'=> 'required|string|max:75',
            'stock'=> 'required|integer|min:0',
            'descripcion'=> 'required|string|max:100',
            'estado'=> 'required|string|max:75'
        ]);
        Ingrediente::create([
            'ingrediente'=> $this->ingrediente,
            'stock'=> $this->stock,
            'descripcionin'=> $this->descripcion,
            'estado'=> $this->estado
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $ingrediente= Ingrediente::find($id);
        $this->ingrediente_id = $ingrediente->id;
        $this->ingrediente = $ingrediente->ingrediente;
        $this->stock = $ingrediente->stock;
        $this->descripcion = $ingrediente->descripcionin;
        $this->estado = $ingrediente->estado;
    }

    public function update(){
        $this->validate([
            'ingrediente'=> 'required|string|max:75',
            'stock'=> 'required|integer',
            'descripcion'=> 'required|string|max:100',
            'estado'=> 'required|string|max:75'
        ]);

        $ingrediente= Ingrediente::find($this->ingrediente_id);
        $ingrediente->update([
            'ingrediente'=> $this->ingrediente,
            'stock'=> $this->stock,
            'descripcionin'=> $this->descripcion,
            'estado'=> $this->estado
        ]);
        $this->msjedit();
        $this->default();

    }

    public function destroy($id){
        Detalleingrediente::destroy($id);

        $this->msjdelete();
    }

    public function formasociar($id){
        $this->resetPage();
        $ingrediente= Ingrediente::find($id);
        $this->ingrediente_id = $ingrediente->id;
        $this->ingrediente = $ingrediente->ingrediente;
        $this->descripcion = $ingrediente->descripcionin;
    }

    public function asociar(){
        $this->validate([
            'producto'=> 'required'
        ]);
        Detalleingrediente::create([
            'producto_id'=> $this->producto_id,
            'ingrediente_id'=> $this->ingrediente_id
        ]);
        $this->msjasociacion();
        $this->default();
        $this->resetPage();
    }
    public function asignarproducto($id){
        $producto= Producto::find($id);
        $this->producto= $producto->nombre;
        $this->producto_id= $producto->id;
        $this->msjproducto();
        $this->resetPage();
    }

    public function default(){
        $this->ingrediente = '';
        $this->stock = '';
        $this->descripcion = '';
        $this->producto_id = '';
        $this->producto='';
        $this->estado = '';
        $this->buscar = '';

    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Ingrediente registrado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Ingrediente editado correctamente']);
    }

    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'producto desasociado correctamente']);
    }

    public function msjasociacion(){
        $this->dispatchBrowserEvent('alert4',['message'=>'producto asociado correctamente']);

    }
    public function msjproducto(){
        $this->dispatchBrowserEvent('alertin',['message'=>'producto asignado']);
    }
}
