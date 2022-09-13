<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Producto;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\withFileUploads;
use Illuminate\Http\UploadedFile;



class AdminAddProductComponent extends Component
{
    use withFileUploads;
    public $nombre;
    public $slug;
    public $short_descripcion;
    public $descripcion;
    public $precio_venta;
    public $precio_descuento;
    public $precio_mayorista;
    public $SKU;
    public $stock_estado;
    public $cantidad;
    public $imagen;
    public $categoria_id;
    public $imagenes;

public function mount()
{
    $this->stock_estado = 'enstock';
}

public function generateSlug()
{
    $this->slug = Str::slug($this->nombre,'-');
}
public function updated($fields)
{
    $this->validateOnly($fields,[
        'nombre'=>'required',
        'slug'=>'required|unique:productos',
        'short_descripcion'=>'required',
        'descripcion'=>'required',
        'precio_venta'=>'required|numeric',
        'precio_descuento'=>'numeric',
        'SKU'=>'required',
        'stock_estado'=>'required',
        'cantidad'=>'required|numeric',
        'imagen'=>'required|mimes:jpeg,png',
        'categoria_id'=>'required'
    ]);

}

public function addProduct()
{
    $this->validate([
        'nombre'=>'required',
        'slug'=>'required|unique:productos',
        'short_descripcion'=>'required',
        'descripcion'=>'required',
        'precio_venta'=>'required|numeric',
        'precio_descuento'=>'numeric',
        'SKU'=>'required',
        'stock_estado'=>'required',
        'cantidad'=>'required|numeric',
        'imagen'=>'required|mimes:jpeg,png',
        'categoria_id'=>'required'
    ]);

    $product = new Producto();
    $product ->nombre = $this->nombre;
    $product ->slug = $this->slug;
    $product ->short_descripcion = $this->short_descripcion;
    $product ->descripcion = $this->descripcion;
    $product ->precio_venta = $this->precio_venta;
    $product ->precio_descuento = $this->precio_descuento;
    $product ->precio_mayorista = $this->precio_mayorista;
    $product ->SKU = $this->SKU;
    $product ->stock_estado = $this->stock_estado;
    $product ->cantidad = $this->cantidad;
    $imageName = Carbon::now()->timestamp. '.' . $this->imagen->extension();
    $this->imagen->storeAs('products',$imageName);
    $product ->imagen = $imageName;
    if ($this->imagenes)
    {
        $imagesname = '';
        foreach ($this->imagenes as $key => $image) {
            $imgName = Carbon::now()->timestamp. $key. '.' . $image->extension();
            $image->storeAs('products',$imgName);
            $imagesname= $imagesname . ',' . $imgName;
        }
        $product->imagenes = $imagesname;
    }

    $product ->categoria_id = $this->categoria_id;
    $product ->save();
    session()->flash('message','Producto creado satisfactoriamente');

}
    public function render()
    {
        $categorias= Categoria::all();
        return view('livewire.admin.admin-add-product-component',['categorias'=>$categorias])->layout('layouts.base_admin');
    }
}
