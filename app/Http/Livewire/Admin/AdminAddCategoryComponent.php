<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categoria;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminAddCategoryComponent extends Component
{

    public $nombre;
    public $slug;

    public function generateSlug(){
        $this->slug = Str::slug($this->nombre);
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'nombre' => 'required',
            'slug' => 'required|unique:categorias'
        ]);

    }

    public function storeCategory(){
        $this->validate([
            'nombre' => 'required',
            'slug' => 'required|unique:categorias'
        ]);

        $category = new Categoria();
        $category->nombre = $this->nombre;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message', 'Categoria creada satisfactoriamente');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-category-component')->layout('layouts.base_admin');
    }
}
