<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableGaleriasMediaNewField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('galerias_media', function (Blueprint $table) {
            $table->dropColumn('capa');
            $table->string('tipo')->default("screenshot")->after('plataforma_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galerias_media', function (Blueprint $table) {
            $table->dropColumn('tipo');
        });
    }
}
