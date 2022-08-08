<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class BaseComponent extends Component
{
    public function render()
    {
        $categorias = Categoria::all();

        return view('layouts.base', ['categorias'=>$categorias]);
    }
}
