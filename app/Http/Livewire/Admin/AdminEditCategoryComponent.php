<?php

namespace App\Http\Livewire\Admin;

use App\Models\Categoria;
use Livewire\Component;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{

    public $category_slug;
    public $category_id;
    public $nombre;
    public $slug;

    public function mount($category_slug){
        $this->category_slug = $category_slug;
        $category = Categoria::where('slug', $category_slug)->first();
        $this->category_id = $category->id;
        $this->nombre = $category->nombre;
        $this->slug = $category->slug;

    }

<<<<<<< HEAD
    public function denerateSlug(){
        $this->slug = Str::slug($this->nombre);
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'nombre' => 'required',
            'slug' => 'required|unique:categorias'
        ]);

=======
    public function generateSlug(){
        $this->slug = Str::slug($this->name);
>>>>>>> 98e20c8fc1a667e1bd7325c03c111b5317a26336
    }

    public function updateCategory(){
        $this->validate([
            'nombre' => 'required',
            'slug' => 'required|unique:categorias'
        ]);
        $category = Categoria::find($this->category_id);
        $category->nombre = $this->nombre;
        $category->slug = $this->slug;
        $category->save();
        session()->flash('message', 'Categoria actualizada correctamente');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.base_admin');
    }
}
