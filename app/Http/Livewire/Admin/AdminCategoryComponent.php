<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithPagination;

class AdminCategoryComponent extends Component
{

    use WithPagination;

    public function mount(){

    }

    public function render()
    {
        $categories = Categoria::paginate(5);
        return view('livewire.admin.admin-category-component', ['categorias'=>$categories])->layout('layouts.base');
    }
}
