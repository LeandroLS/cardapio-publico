<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Municipios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       DB::statement(
           "CREATE TABLE municipios(
            codigo_ibge INT NOT NULL,
            nome VARCHAR(100) NOT NULL,
            latitude FLOAT(8) NOT NULL,
            longitude FLOAT(8) NOT NULL,
            capital BOOLEAN NOT NULL,
            codigo_uf INT NOT NULL,
            PRIMARY KEY (codigo_ibge),
            FOREIGN KEY (codigo_uf) REFERENCES estados (codigo_uf)
        );");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('municipios');
    }
}
