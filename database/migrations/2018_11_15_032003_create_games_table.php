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
            $table->text('sinopse');
            $table->integer('genero1_id')->unsigned();
            $table->integer('genero2_id')->nullable()->unsigned();
            $table->integer('genero3_id')->nullable()->unsigned();
            $table->integer('genero4_id')->nullable()->unsigned();
            $table->integer('genero5_id')->nullable()->unsigned();
            $table->integer('plataforma1_id')->unsigned();
            $table->integer('plataforma2_id')->nullable()->unsigned();
            $table->integer('plataforma3_id')->nullable()->unsigned();
            $table->integer('plataforma4_id')->nullable()->unsigned();
            $table->integer('plataforma5_id')->nullable()->unsigned();
            $table->integer('desenvolvedora_id')->unsigned();
            $table->integer('galeria_id')->nullable()->unsigned();
            $table->string('trailer_lancamento')->nullable();
            $table->string('trailer_gameplay')->nullable();
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
