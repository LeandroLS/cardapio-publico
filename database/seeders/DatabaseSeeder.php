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
        \App\Models\CardapioCategoria::factory()->times(10)
            ->hasItens(3)
            ->create();
    }
}
