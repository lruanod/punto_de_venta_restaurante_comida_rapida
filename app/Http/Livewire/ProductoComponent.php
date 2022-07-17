<?php

namespace App\Http\Livewire;


use App\Models\Categoria;
use App\Models\Producto;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
Use Storage;


class ProductoComponent extends Component
{
    use WithPagination, WithFileUploads;
    protected $paginationTheme ="bootstrap";
    public $producto_id,$nombre,$precio,$descripcion,$url,$descuento,$estado,$categoria_id,$url2,$url3,$identificador,$identificador2;
    public $buscar;


    public function  mount(){
       $this->identificador = rand();
       $this->identificador2 = rand();
    }
    public function getProductosProperty(){

        $busqueda='%'.$this->buscar.'%';
        return Producto::where('nombre','like',$busqueda)->orwhere('descripcion','like',$busqueda)->paginate(8,['*'],'producto');
    }
    public function render()
    {
        return view('livewire.producto-component',[
            'productos' => $this->getProductosProperty(),
            'categorias'=> Categoria::all()
        ]);
    }
    public function store(){
        $this->validate([
            'nombre'=> 'required|string|max:100',
            'precio'=> 'required|numeric|min:0',
            'descripcion'=> 'required|string|max:100',
            'url'=> 'required|image|max:2048',
            'descuento'=> 'required|numeric|min:0',
            'estado'=> 'required|string|max:45',
            'categoria_id'=> 'required|integer',
        ]);

        /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
        $image= $this->url->store('portadas','public');
        /*fin*/
        Producto::create([
            'nombre'=> $this->nombre,
            'precio'=> $this->precio,
            'descripcion'=> $this->descripcion,
            'url'=> $image,
            'descuento'=> $this->descuento,
            'estado'=> $this->estado,
            'categoria_id'=> $this->categoria_id
        ]);
        $this->msjexito();
        $this->default();
    }

    public function edit($id){
        $producto= Producto::find($id);
        $this->producto_id = $producto->id;
        $this->nombre = $producto->nombre;
        $this->precio = $producto->precio;
        $this->descripcion = $producto->descripcion;
        $this->url3 = $producto->url;
        $this->descuento = $producto->descuento;
        $this->estado = $producto->estado;
        $this->categoria_id = $producto->categoria_id;
    }

    public function update(){
        $this->validate([
            'nombre'=> 'required|string|max:100',
            'precio'=> 'required|numeric|min:0',
            'descripcion'=> 'required|string|max:100',
            'descuento'=> 'required|numeric|min:0',
            'estado'=> 'required|string|max:45',
            'categoria_id'=> 'required|integer',
        ]);
        $producto= Producto::find($this->producto_id);
        if(!empty($this->url2)){
            // eliminar archivo existente
            Storage::disk('public')->delete($producto->url);
            //eliminar

            /*tratamiento para archivos y enviarlos con un nombre unico y a una carpeta en especifico*/
            $image= $this->url2->store('portadas','public');
            /*fin*/
            $producto->update([
                'nombre'=> $this->nombre,
                'precio'=> $this->precio,
                'descripcion'=> $this->descripcion,
                'url'=> $image,
                'descuento'=> $this->descuento,
                'estado'=> $this->estado,
                'categoria_id'=> $this->categoria_id
            ]);
        } else{
            $producto->update([
                'nombre'=> $this->nombre,
                'precio'=> $this->precio,
                'descripcion'=> $this->descripcion,
                'descuento'=> $this->descuento,
                'estado'=> $this->estado,
                'categoria_id'=> $this->categoria_id
            ]);
        }

        $this->msjedit();
        $this->default();
    }

    public function default(){
        $this->nombre = '';
        $this->precio = '';
        $this->descripcion = '';
        $this->url = '';
        $this->url2 = '';
        $this->url3 = '';
        $this->descuento = '';
        $this->estado = '';
        $this->categoria_id = '';
        $this->buscar = '';
        $this->view='create';
        $this->identificador = rand();
        $this->identificador2 = rand();

    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Producto registrado correctamente']);
    }

    public function msjedit(){
        $this->dispatchBrowserEvent('alert2',['message'=>'Producto editado correctamente']);
    }
}
