<?php

namespace Database\Factories;

use App\Models\{CategoriaItem, CardapioCategoria};
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoriaItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CategoriaItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'descricao' => $this->faker->sentence,
            'cardapio_categoria_id' => CardapioCategoria::factory(),
            'preco' => 10.10,
            'ordem' => $this->faker->numberBetween(1, 100)
        ];
    }
}
