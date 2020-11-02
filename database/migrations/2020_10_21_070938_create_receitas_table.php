<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReceitasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categoria_receitas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->timestamps();
        });

        Schema::create('receitas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->text('ingredientes');
            $table->text('preparacao');
            $table->string('imagem');
            $table->bigInteger('user_id');
            $table->bigInteger('categoria_id');
            $table->timestamps();
//            $table->foreign('user_id')->references('id')->on('users')->comment('O utilizador que criou a receita');
//            $table->foreign('categoria_id')->references('id')->on('categoria_receita')->comment('A categoria da receita');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoria_receita');
        Schema::dropIfExists('receitas');
    }
}
