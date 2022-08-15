<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\HomeSlider;

class HomeComponent extends Component
{
    public function render()
    {
        $categorias = Categoria::all();
        $sliders = HomeSlider::where('status', 1)->get();
        $lproducts = Producto::orderBy('created_at', 'DESC')->get();
        return view('livewire.home-component', ['categorias'=>$categorias, 'sliders'=>$sliders, 'lproducts'=>$lproducts])->layout('layouts.base');
    }
}
