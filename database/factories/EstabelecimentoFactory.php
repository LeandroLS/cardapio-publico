<?php

namespace Database\Factories;

use App\Models\{Estabelecimento, User, Municipio};
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Http\Controllers\EstabelecimentoController;

class EstabelecimentoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Estabelecimento::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nome' => $this->faker->name,
            'url' => EstabelecimentoController::nameToUrl($this->faker->name),
            'descricao' => $this->faker->sentence,
            'user_id' => User::factory(),
            'codigo_ibge' => Municipio::inRandomOrder()->first()->codigo_ibge,
            'cep' => $this->faker->randomNumber(8),
            'endereco' => $this->faker->streetName,
            'numero' => $this->faker->randomNumber(4),
            'bairro' => $this->faker->name,
        ];
    }
}
