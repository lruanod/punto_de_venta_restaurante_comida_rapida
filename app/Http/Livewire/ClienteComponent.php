<?php

namespace App\Http\Livewire;


use App\Models\Cliente;
use Livewire\Component;
use Livewire\WithPagination;

class ClienteComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $cliente_id,$nombre,$direccion,$nit;
    public $buscar;

    public function getClientesProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Cliente::where('nombre','like',$busqueda)->orwhere('nit','like',$busqueda)->paginate(8,['*'],'cliente');
    }
    public function render()
    {
        return view('livewire.cliente-component',[
            'clientes' => $this->getClientesProperty()
            ]);
    }
    public function store(){
        $this->validate([
            'nombre'=> 'required|string|max:75',
            'direccion'=> 'required|string|max:100',
            'nit'=> 'required|string|max:12'
        ]);
        Cliente::create([
            'nombre'=> $this->nombre,
            'direccion'=> $this->direccion,
            'nit'=> $this->nit
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $cliente= Cliente::find($id);
        $this->cliente_id = $cliente->id;
        $this->nombre = $cliente->nombre;
        $this->direccion = $cliente->direccion;
        $this->nit = $cliente->nit;
    }

    public function update(){
        $this->validate([
            'nombre'=> 'required|string|max:75',
            'direccion'=> 'required|string|max:100',
            'nit'=> 'required|string|max:12'
        ]);

        $cliente= Cliente::find($this->cliente_id);
        $cliente->update([
            'nombre'=> $this->nombre,
            'direccion'=> $this->direccion,
            'nit'=> $this->nit
        ]);
        $this->msjedit();
        $this->default();

    }

    public function default(){
        $this->nombre = '';
        $this->direccion = '';
        $this->nit = '';
        $this->buscar = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Cliente registrado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Cliente editado correctamente']);
    }
}
