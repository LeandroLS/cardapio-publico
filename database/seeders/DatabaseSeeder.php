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
            MunicipiosSeeder::class,
            CardapioExemploSeeder::class
        ]);
        $users = \App\Models\User::factory()->times(10)
            ->has(
                \App\Models\Estabelecimento::factory()->has(
                    \App\Models\CardapioCategoria::factory()->count(10)
                    ->hasItens(3)
                )->count(1)
            )->create();

        // foreach ($users as $user) {
        //     repeat:
        //     try {
        //          \App\Models\UserAssinatura::factory()
        //         ->count(1)
        //         ->for(\App\Models\User::factory())
        //         ->create();
        //     } catch (\Illuminate\Database\QueryException $e) {
        //         goto repeat;
        //     }
        // }
            // \App\Models\UserAssinatura::factory()
            // ->count(10)
            // ->for(\App\Models\User::factory())
            // ->create();
    }
}
