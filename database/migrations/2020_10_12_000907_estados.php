<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Estados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::statement("CREATE TABLE estados(
        //     codigo_uf INT NOT NULL,
        //     uf VARCHAR(2) NOT NULL,
        //     nome VARCHAR(100) NOT NULL,
        //     latitude FLOAT(8) NOT NULL,
        //     longitude FLOAT(8) NOT NULL,
        //     PRIMARY KEY (codigo_uf)
        // );");

         Schema::create('estados', function (Blueprint $table) {
            $table->bigIncrements('codigo_uf');
            $table->string('uf', 2);
            $table->string('nome', 2);
            $table->float('latitude', 8);
            $table->float('longitude', 8);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estadoss');
    }
}
