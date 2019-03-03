<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('galerias_media', function (Blueprint $table) {
            $table->foreign('galeria_id')->references('id')->on('galerias');
            $table->foreign('media_id')->references('id')->on('medias');
        });

        Schema::table('games', function (Blueprint $table) {
            $table->foreign('genero1_id')->references('id')->on('generos');
            $table->foreign('genero2_id')->references('id')->on('generos');
            $table->foreign('genero3_id')->references('id')->on('generos');
            $table->foreign('plataforma1_id')->references('id')->on('plataformas');
            $table->foreign('plataforma2_id')->references('id')->on('plataformas');
            $table->foreign('plataforma3_id')->references('id')->on('plataformas');
            $table->foreign('desenvolvedora_id')->references('id')->on('desenvolvedoras');
            $table->foreign('galeria_id')->references('id')->on('galerias');
        });

        Schema::table('medias', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('medias', function (Blueprint $table) {
            $table->dropForeign('medias_user_id_foreign');
        });

        Schema::table('galerias', function (Blueprint $table) {
            $table->dropForeign('galerias_user_id_foreign');
        });

        Schema::table('games', function (Blueprint $table) {
            $table->dropForeign('games_galeria_id_foreign');
            $table->dropForeign('games_desenvolvedora_id_foreign');
            $table->dropForeign('games_plataforma3_id_foreign');
            $table->dropForeign('games_plataforma2_id_foreign');
            $table->dropForeign('games_plataforma1_id_foreign');
            $table->dropForeign('games_genero3_id_foreign');
            $table->dropForeign('games_genero2_id_foreign');
            $table->dropForeign('games_genero1_id_foreign');
        });

        Schema::table('galerias_media', function (Blueprint $table) {
            $table->dropForeign('galerias_media_media_id_foreign');
            $table->dropForeign('galerias_media_galeria_id_foreign');
        });
    }
}
