<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class HomeComponent extends Component
{
    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.home-component', ['categorias'=>$categorias])->layout('layouts.base');
    }
}
