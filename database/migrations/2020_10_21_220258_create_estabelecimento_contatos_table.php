<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstabelecimentoContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estabelecimento_contatos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('estabelecimento_id');
            $table->foreign('estabelecimento_id')->references('id')->on('estabelecimentos')->onDelete('cascade');
            $table->text('tipo_contato', 100);
            $table->text('contato');
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
        Schema::dropIfExists('estabelecimento_contatos');
    }
}
