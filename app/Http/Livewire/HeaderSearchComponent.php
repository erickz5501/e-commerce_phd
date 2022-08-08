<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class HeaderSearchComponent extends Component
{
    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount()
    {
        $this->product_cat = 'Categorias';
        $this->fill(request()->only('search','product_cat','product_cat_id'));
    }

    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.header-search-component',['categorias'=>$categorias]);
    }
}
