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

        foreach($this->plataformas() as $plataforma_) {
            $plataforma = new Plataforma([
                'nome'  => $plataforma_[0],
                'slug'  => $plataforma_[1],
            ]);
            $plataforma->save();
        }
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

    private function plataformas() {
        return [
                [ 'Xbox 360','xbox360' ],
                [ 'Xbox One','xboxone' ],
                [ 'Xbox Series X / S','xboxseriesxs' ],
                [ 'Playstation 3','playstation3' ],
                [ 'Playstation 4','playstation4' ],
                [ 'Playstation 5','playstation5' ],
                [ 'PC','pc' ],
               ];
    }

}
