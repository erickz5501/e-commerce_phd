<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Categoria;

class AdminAddProductComponent extends Component
{
    public function render()
    {

        $categorias= Categoria::all();
        return view('livewire.admin.admin-add-product-component',['categorias'=>$categorias])->layout('layouts.base_admin');
    }
}
