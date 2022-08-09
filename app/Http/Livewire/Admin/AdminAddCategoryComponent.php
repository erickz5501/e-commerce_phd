<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categoria;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{

    public $name;
    public $slug;

    public function generateSlug(){
        $this->slug = Str::slug($this->name);
    }

    public function storeCategory(){
        $category = new Categoria();
        $category->nombre = $this->name;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message', 'Categoria creada satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base_admin');
    }
}
