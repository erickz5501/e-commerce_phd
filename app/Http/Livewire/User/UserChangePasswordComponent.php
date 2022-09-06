<?php

namespace App\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Models\User;

class UserChangePasswordComponent extends Component
{

    public $current_password;
    public $password;
    public $password_confirmation;

    public function updated($fields){
        $this->validateOnly($fields,[
            'current_password'=>'required',
            'password'=>'required|min:8|confirmed|different:current_password'
        ]);
    }

    public function changePassword(){
        $this->validate([
            'current_password'=>'required',
            'password'=>'required|min:8|confirmed|different:current_password'
        ]);

        if(Hash::check($this->current_password, Auth::user()->password)){
            $user = User::findOrFail(Auth::user()->id);
            $user->password = Hash::make($this->password);
            $user->save();
            session()->flash('password_success','La contraseña se cambio con exito.');
        }else{
            session()->flash('password_error','Contraseña no cambiada.');
        }

    }

    public function render()
    {
        return view('livewire.user.user-change-password-component')->layout('layouts.base');
    }
}
