<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\HomeSlider;

class HomeComponent extends Component
{
    public function render()
    {
        $categorias = Categoria::all();
        $sliders = HomeSlider::where('status', 1)->get();
        return view('livewire.home-component', ['categorias'=>$categorias, 'sliders'=>$sliders])->layout('layouts.base');
    }
}
