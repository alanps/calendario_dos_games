<?php

use Illuminate\Database\Seeder;
use Models\Desenvolvedora;

class DesenvolvedorasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Desenvolvedora::truncate();

        foreach($this->nomes() as $nome) {
            $desenvolvedora = new Desenvolvedora([
                'nome'  => $nome,
            ]);
            $desenvolvedora->save();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function nomes() {
        return ['Capcom',
                'Square Enix',
                'Konami',
                'Ubisoft',
                'SEGA',
                'Electronic Arts',
                'Activision Blizzard',
                'Nintendo',
                'Sony',
                'Microsoft',
                'Rockstar Studios',
                'Warner Bros.'
               ];
    }

}
