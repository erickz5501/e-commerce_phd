<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Producto;
use Livewire\WithPagination;

class AdminProductComponent extends Component
{

    use WithPagination;



    protected $listeners=[
        'deleteRow'=>'deleteProduct'
    ];

    public function deleteProduct($id){
        $product = Producto::find($id);
        if ($product->imagen) {
            unlink('assets/images/products/'.'/'.$product->imagen);
        }
        if ($product->imagenes) {
            $images = explode(",",$product->imagenes);
            foreach($images as $image){
                unlink('assets/images/products/'.'/'.$image);
            }
        }
        $product->delete();
        $this->emit('product-deleted', 'Producto eliminado');
        session('message', 'Producto elminada correctamente');
    }

    public function mount(){

    }

    public function render()
    {
        $productos = Producto::paginate(5);
        return view('livewire.admin.admin-product-component', ['productos' => $productos])->layout('layouts.base_admin');
    }
}
