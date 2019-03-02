<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nome');
            $table->text('descricao');
            $table->integer('genero1_id')->unsigned();
            $table->integer('genero2_id')->nullable()->unsigned();
            $table->integer('genero3_id')->nullable()->unsigned();
            $table->integer('plataforma1_id')->unsigned();
            $table->integer('plataforma2_id')->nullable()->unsigned();
            $table->integer('plataforma3_id')->nullable()->unsigned();
            $table->integer('desenvolvedora_id')->unsigned();
            $table->integer('galeria_id')->unsigned();
            $table->string('trailer_lancamento');
            $table->string('trailer_gameplay');
            $table->integer('lancamento');
            $table->integer('created_at')->nullable();
            $table->integer('updated_at')->nullable();
            $table->integer('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('games');
    }
}
