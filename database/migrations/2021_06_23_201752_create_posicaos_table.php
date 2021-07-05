<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosicaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posicao', function (Blueprint $table) {
            $table->id();
            $table->string("goleiro", 100);
            $table->string("defensor", 100);
            $table->string("lateral", 100);
            $table->string("volante", 100);
            $table->string("meia", 100);
            $table->string("atacante", 100);
            $table->string("descricao", 350);
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
        Schema::dropIfExists('posicao');
    }
}
