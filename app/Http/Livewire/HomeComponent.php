<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Producto;
use App\Models\HomeSlider;
use App\Models\HomeCategory;

class HomeComponent extends Component
{
    public function render()
    {
        $categorias = Categoria::all();
        $sliders = HomeSlider::where('status', 1)->get();
        $lproducts = Producto::orderBy('created_at', 'DESC')->get()->take(8);

        $category = HomeCategory::find(1);
        $cats = explode(',', $category->sel_categories);
        $categories = Categoria::whereIn('id', $cats)->get();
        $no_of_products = $category->no_of_products;

        $sproducts = Producto::where('precio_venta','>', 0)->inRandomOrder()->get()->take(8);
        return view('livewire.home-component', ['categorias'=>$categorias, 'sliders'=>$sliders, 'lproducts'=>$lproducts, 'categories'=>$categories, 'no_of_products'=>$no_of_products, 'sproducts'=>$sproducts])->layout('layouts.base');

    }
}
