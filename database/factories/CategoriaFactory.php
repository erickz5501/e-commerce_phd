<?php

namespace Database\Factories;

use App\Models\Categoria;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoriaFactory extends Factory
{

    protected $model = Categoria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $categoria_name = $this->faker->unique()->words($nb=2, $asText=true);
        $slug = Str::slug($categoria_name);
        return [
            'nombre' => $categoria_name,
            'slug' => $slug
        ];
    }
}
