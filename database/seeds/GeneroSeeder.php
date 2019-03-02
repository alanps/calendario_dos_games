<?php

use Illuminate\Database\Seeder;
use Models\Genero;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Genero::truncate();

        foreach($this->nomes() as $nome) {
            $genero = new Genero([
                'nome'  => $nome,
            ]);
            $genero->save();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function nomes() {
        return ['Ação',
                'Aventura',
                'Corrida',
                'Esporte',
                'Estratégia',
                'Fitness',
                'Luta',
                'RPG',
                'MMO',
                'Musical',
                'Simulação',
                'Shooter',
                'Terror',
               ];
    }

}
