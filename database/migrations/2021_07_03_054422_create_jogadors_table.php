<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJogadorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jogadors', function (Blueprint $table) {
            $table->id();
            Schema::create('jogador', function (Blueprint $table) {
                $table->id();
                $table->string("nome_jogador", 100);
                $table->date("data_nascimento");
                $table->string("clube_jogador", 100);
                $table->string("posicao_jogador", 100);
                $table->timestamps();
            });
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
        Schema::dropIfExists('jogadors');
    }
}
