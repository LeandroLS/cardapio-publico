<?php

namespace Database\Factories;

use App\Models\CategoriaCardapio;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaCardapioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoriaCardapio::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name
        ];
    }
}
