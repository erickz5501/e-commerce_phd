<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductoFactory extends Factory
{

    protected $model = Producto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $producto_name = $this->faker->unique()->words($nb=4, $asText=true);
        $slug = Str::slug($producto_name);
        return [
            'nombre' => $producto_name,
            'slug' => $slug,
            'short_descripcion' => $this->faker->text(200),
            'descripcion' => $this->faker->text(500),
            'precio_venta' => $this->faker->numberBetween(10,500),
            'SKU' => 'DIGI'.$this->faker->unique()->numberBetween(10,500),
            'cantidad' => $this->faker->numberBetween(100,200),
            'imagen' => 'digital_' . $this->faker->unique()->numberBetween(1,22).'.jpg',
            'categoria_id' => $this->faker->numberBetween(1, 5)
        ];
    }
}
