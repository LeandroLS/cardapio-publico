<?php

namespace Database\Factories;

use App\Models\{CardapioCategoria, Estabelecimento};
use Illuminate\Database\Eloquent\Factories\Factory;

class CardapioCategoriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CardapioCategoria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'estabelecimento_id' => Estabelecimento::factory(),
            'ordem' => $this->faker->numberBetween(1, 100)
        ];
    }
}
