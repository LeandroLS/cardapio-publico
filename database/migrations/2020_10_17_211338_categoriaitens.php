<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Categoriaitens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_itens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('cardapio_categoria_id');
            $table->foreign('cardapio_categoria_id')->references('id')->on('cardapio_categorias')->onDelete('cascade');
            $table->text('nome');
            $table->text('descricao')->nullable();
            $table->text('nome_foto_prato')->nullable();
            $table->double('preco', 10, 2)->nullable();
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
        Schema::dropIfExists('categoria_itens');
    }
}
