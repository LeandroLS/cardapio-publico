<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            EstadosSeeder::class,
            MunicipiosSeeder::class
        ]);
        \App\Models\User::factory()->times(10)
            ->has(
                \App\Models\Estabelecimento::factory()->has(
                    \App\Models\CardapioCategoria::factory()->count(10)
                    ->hasItens(3)
                )->count(1)
            )->create();
    }
}
