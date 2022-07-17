<?php

namespace App\Http\Livewire;

use App\Models\Usuario;
use Livewire\Component;
use Livewire\Request;

class LoginComponent extends Component
{
    public $usuario,$pass;
    public function render()
    {
        return view('livewire.login-component');
    }

    public function login(){
        $this->validate([
            'usuario'=> 'required|string|max:75',
            'pass'=> 'required|string|min:7'

        ]);
        if(Usuario::where('usuario','=',$this->usuario)->where('pass','=',$this->pass)->count() > 0){
            $usuario= Usuario::where('usuario','=',$this->usuario)->where('pass','=',$this->pass)->get();
            foreach ( $usuario as $user){
                session(['usuario'=>$user->usuario]);
                session(['nombre'=>$user->nombre]);
                session(['usuario_id'=>$user->id]);
                session(['rol'=>$user->rol]);
            }
            $this->msjexito();
            return redirect('/pedidos');
        } else{
            $this->msjdelete();
        }
        $this->default();
    }

    // logout
    public function  logout(){
        session()->invalidate();
        $this->msjcerrar();
        $this->default();
        return redirect('/login');
    }

    public function msjexito(){
        $this->dispatchBrowserEvent('alert',['message'=>'Bienvenido']);
    }

    public function msjcerrar(){
        $this->dispatchBrowserEvent('alert2',['message'=>'cerro sesión correctamente']);
    }

    public function msjdelete(){
        $this->dispatchBrowserEvent('alert3',['message'=>'credenciales no validad, verifique usuario y contraseña']);
    }

    public function default(){
        $this->usuario = '';
        $this->pass = '';
    }
}
