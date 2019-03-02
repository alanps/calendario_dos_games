<?php

use Illuminate\Database\Seeder;
use Models\Plataforma;

class PlataformaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Plataforma::truncate();

        foreach($this->nomes() as $nome) {
            $plataforma = new Plataforma([
                'nome'  => $nome,
            ]);
            $plataforma->save();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function nomes() {
        return ['Xbox One',
                'Xbox 360',
                'Playstation 3',
                'Playstation 4',
                'PC',
               ];
    }

}
