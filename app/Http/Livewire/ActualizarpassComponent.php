<?php

namespace App\Http\Livewire;

use App\Models\Usuario;
use Livewire\Component;

class ActualizarpassComponent extends Component
{
    public $pass,$pass2,$pass3;
    public function render()
    {
        return view('livewire.actualizarpass-component');
    }

    public function actualizar(){
        $this->validate([
            'pass'=> 'required|string|min:7',
            'pass2'=> 'required|string|min:7',
            'pass3'=> 'required|string|min:7'
        ]);
       $usuario_id=session()->get('usuario_id');

        if(Usuario::where('id','=',$usuario_id)->where('pass','=',$this->pass)->count() > 0){

            if($this->pass2==$this->pass3){

                $usuario= Usuario::find($usuario_id);
                $usuario->update([
                    'pass'=> $this->pass2
                ]);

                $this->msjexito();
                $this->default();

            }else{
                $this->msjnoiguales();
            }
        } else{
            $this->msjnocoincide();
        }
    }

    public function default(){
        $this->pass = '';
        $this->pass2 = '';
        $this->pass3 = '';
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Contraseña actualizada correctamente']);
    }

    public function msjnoiguales(){
        $this->dispatchBrowserEvent('alert4',['message'=>'La contraseña nueva y de confirmación son diferentes']);

    }

    public function msjnocoincide(){
        $this->dispatchBrowserEvent('alert3',['message'=>'La contrase;a no coincide con la anterior']);
    }
}
