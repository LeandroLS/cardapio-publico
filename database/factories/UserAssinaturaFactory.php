<?php

namespace Database\Factories;

use App\Models\{UserAssinatura, User};
use Illuminate\Database\Eloquent\Factories\Factory;

class UserAssinaturaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserAssinatura::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'start_at' => \Carbon\Carbon::now(),
            'end_at' => \Carbon\Carbon::now(),
            'user_id' => User::factory(),
        ];
    }
}
