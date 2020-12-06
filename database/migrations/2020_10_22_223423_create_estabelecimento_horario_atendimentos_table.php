<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstabelecimentoHorarioAtendimentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estabelecimento_dias_atendimentos', function (Blueprint $table) {
          $table->bigIncrements('id');
            $table->unsignedBigInteger('estabelecimento_id');
            $table->foreign('estabelecimento_id')->references('id')->on('estabelecimentos')->onDelete('cascade');
            $table->string('dia_semana', 100);
            $table->string('abre', 50);
            $table->string('fecha', 50);
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
        Schema::dropIfExists('estabelecimento_dias_atendimentos');
    }
}
