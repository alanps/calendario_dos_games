<?php

use Illuminate\Database\Seeder;
use Models\Galeria;

class GaleriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Galeria::truncate();

        $galeria = new Galeria([
            'nome'  => "Alan Pardini Sant'Ana",
            'email'  => "alanps2012@gmail.com",
            'password'  => bcrypt("123"),
            'api_token'  => "NOvgX6zpAh8F0JvZhk2EVV1RxzUk7JDrvJJC2x9lFO3mzz9Lm3rgPGAFyKp6",
            'thumbnail_id'  => 1,
            'nascimento'  => 560822400,
            'sexo'  => "Masculino",
        ]);
        $galeria->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

}
