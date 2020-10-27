<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstabelecimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estabelecimentos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('nome');
            $table->text('url');
            $table->text('descricao')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('codigo_ibge')->nullable();
            $table->foreign('codigo_ibge')->references('codigo_ibge')->on('municipios');
            $table->text('cep', 8)->nullable();
            $table->text('endereco')->nullable();
            $table->text('numero', 20)->nullable();
            $table->text('bairro')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estabelecimentos');
    }
}
