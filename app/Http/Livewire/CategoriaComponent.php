<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Categoria;


class CategoriaComponent extends Component
{
    use WithPagination;
    protected $paginationTheme ="bootstrap";
    public $categoria_id,$categoria,$estado;
    public $buscar;

    public function getCategoriasProperty(){
        $busqueda='%'.$this->buscar.'%';
        return Categoria::where('categoria','like',$busqueda)->paginate(8,['*'],'categoria');
    }

    public function render()
    {
        return view('livewire.categoria-component',[
            'categorias' => $this->getCategoriasProperty()
        ]);
    }
    public function store(){
         $this->validate([
            'categoria'=> 'required|string|max:45',
            'estado'=> 'required|string|max:45',
        ]);
         Categoria::create([
             'categoria'=> $this->categoria,
             'estado'=> $this->estado
         ]);
         $this->msjexito();
         $this->default();
    }

    public function edit($id){
        $categoria= Categoria::find($id);
        $this->categoria_id = $categoria->id;
        $this->categoria = $categoria->categoria;
        $this->estado = $categoria->estado;
    }

    public function update(){
        $this->validate([
            'categoria'=> 'required|string|max:45',
            'estado'=> 'required|string|max:45',
        ]);

        $categoria= Categoria::find($this->categoria_id);
        $categoria->update([
            'categoria'=> $this->categoria,
            'estado'=> $this->estado
        ]);
        $this->msjedit();
        $this->default();

    }


    public function default(){
        $this->categoria = '';
        $this->estado = '';
        $this->buscar = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Categoría registrada correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Categoría editada correctamente']);
    }
}
