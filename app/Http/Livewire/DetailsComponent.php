<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Producto;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
    }
    public function render()
    {
        $productos = Producto::where('slug',$this->slug)->first();
        $popular_products= Producto::inRandomOrder()->limit(4)->get();
        $related_products = Producto::where('categoria_id',$productos->categoria_id)->inRandomOrder()->limit(5)->get();
        return view('livewire.details-component',['productos'=>$productos, 'popular_products'=>$popular_products, 'related_products'=>$related_products])->layout('layouts.base');
    }
}
