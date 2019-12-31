<?php

use Illuminate\Database\Seeder;
use Models\Game;
use Models\Galeria;
use Models\Media;
use Models\GaleriasMedia;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Game::truncate();
        Galeria::truncate();
        Media::truncate();
        GaleriasMedia::truncate();


        ////////////////////////////////
        //Fifa 19

        //galeria
        $galeria = new Galeria([
            'nome'  => "Fifa 19",
        ]);
        $galeria->save();

        //media
        $media1 = new Media([
            'user_id'  => 1,
            'extensao'  => ".jpg",
            'height'  => 10368,
            'width'  => 10368,
            'tamanho'  => 10368,
            'nome_arquivo'  => "0c674c9afc.jpg",
            'url'  => "uploads/0c674c9afc.jpg",
        ]);
        $media1->save();

        //galeria_media
        $galeria_media = new GaleriasMedia([
            'galeria_id'  => $galeria->id,
            'media_id'  => $media1->id,
            'plataforma_id'  => 1,
            'capa'  => 0
        ]);
        $galeria_media->save();

        $media2 = new Media([
            'user_id'  => 1,
            'extensao'  => ".jpg",
            'height'  => 10368,
            'width'  => 10368,
            'tamanho'  => 10368,
            'nome_arquivo'  => "0c674c9afc2.jpg",
            'url'  => "uploads/0c674c9afc2.jpg",
        ]);
        $media2->save();

        //galeria_media
        $galeria_media = new GaleriasMedia([
            'galeria_id'  => $galeria->id,
            'media_id'  => $media2->id,
            'plataforma_id'  => 4,
            'capa'  => 0
        ]);
        $galeria_media->save();


        //game
        $game = new Game([
            'nome'  => "Fifa 19",
            'sinopse'  => "FIFA 19 é um jogo eletrônico de futebol desenvolvido publicado pela EA Sports, que foi lançado localmente em 28 de setembro de 2018. Este é terceiro a usar o mecanismo de jogo da Frostbite para Xbox One, PS4 e PC.",
            'genero1_id'  => 4,
            'plataforma1_id'  => 1,
            'plataforma2_id'  => 2,
            'plataforma3_id'  => 3,
            'plataforma4_id'  => 4,
            'plataforma5_id'  => 5,
            'desenvolvedora_id'  => 6,
            'lancamento'  => 1538092800,
            'galeria_id' => $galeria->id,
        ]);
        $game->save();


        ////////////////////////////////
        //Far Cry 5

        //galeria
        $galeria = new Galeria([
            'nome'  => "Far Cry 5",
        ]);
        $galeria->save();

        //media
        $media = new Media([
            'user_id'  => 1,
            'extensao'  => ".jpg",
            'height'  => 10368,
            'width'  => 10368,
            'tamanho'  => 10368,
            'nome_arquivo'  => "5b4e242ea4e14.jpg",
            'url'  => "uploads/5b4e242ea4e14.jpg",
        ]);
        $media->save();

        //galeria_media
        $galeria_media = new GaleriasMedia([
            'galeria_id'  => $galeria->id,
            'media_id'  => $media->id,
            'plataforma_id'  => 1,
            'capa'  => 0
        ]);
        $galeria_media->save();

        //game
        $game = new Game([
            'nome'  => "Far Cry 5",
            'sinopse'  => "Far Cry 5 é um jogo eletrônico de tiro em primeira pessoa de ação-aventura ambientado em um mundo aberto. Foi desenvolvido pela Ubisoft Montreal e publicado pela Ubisoft para Microsoft Windows, PlayStation 4 e Xbox One em 27 de março de 2018. É o décimo titulo da serie Far Cry e o quinto jogo principal.",
            'genero1_id'  => 1,
            'genero2_id'  => 2,
            'genero3_id'  => 12,
            'plataforma1_id'  => 1,
            'plataforma2_id'  => 4,
            'plataforma3_id'  => 5,
            'desenvolvedora_id'  => 4,
            'lancamento'  => 1522108800,
            'galeria_id' => $galeria->id,
        ]);
        $game->save();


        ////////////////////////////////
        //Red Dead Redemption II
        
        //galeria
        $galeria = new Galeria([
            'nome'  => "Red Dead Redemption II",
        ]);
        $galeria->save();

        //media
        $media = new Media([
            'user_id'  => 1,
            'extensao'  => ".jpg",
            'height'  => 10368,
            'width'  => 10368,
            'tamanho'  => 10368,
            'nome_arquivo'  => "5b4e380eccc4f.jpg",
            'url'  => "uploads/5b4e380eccc4f.jpg",
        ]);
        $media->save();

        //galeria_media
        $galeria_media = new GaleriasMedia([
            'galeria_id'  => $galeria->id,
            'media_id'  => $media->id,
            'plataforma_id'  => 1,
            'capa'  => 0
        ]);
        $galeria_media->save();

        //game
        $game = new Game([
            'nome'  => "Red Dead Redemption II",
            'sinopse'  => "Red Dead Redemption II é um jogo eletrônico de ação-aventura western desenvolvido pela Rockstar Studios e publicado pela Rockstar Games. Lançado mundialmente em 26 de outubro de 2018 para PlayStation 4 e Xbox One, é uma prequela de Red Dead Redemption e o terceiro título da franquia Red Dead",
            'genero1_id'  => 1,
            'genero2_id'  => 2,
            'plataforma1_id'  => 1,
            'plataforma2_id'  => 4,
            'plataforma3_id'  => 5,
            'desenvolvedora_id'  => 11,
            'lancamento'  => 1540512000,
            'galeria_id' => $galeria->id,
        ]);
        $game->save();


        ////////////////////////////////
        //Middle Earth: Shadow of War
        
        //galeria
        $galeria = new Galeria([
            'nome'  => "Middle Earth: Shadow of War",
        ]);
        $galeria->save();

        //media
        $media = new Media([
            'user_id'  => 1,
            'extensao'  => ".jpg",
            'height'  => 10368,
            'width'  => 10368,
            'tamanho'  => 10368,
            'nome_arquivo'  => "5b4f709ee5379.jpg",
            'url'  => "uploads/5b4f709ee5379.jpg",
        ]);
        $media->save();

        //galeria_media
        $galeria_media = new GaleriasMedia([
            'galeria_id'  => $galeria->id,
            'media_id'  => $media->id,
            'plataforma_id'  => 1,
            'capa'  => 0
        ]);
        $galeria_media->save();

        //game
        $game = new Game([
            'nome'  => "Middle Earth: Shadow of War",
            'sinopse'  => "Middle Earth: Shadow of War é um jogo de RPG de ação ambientado no universo da saga O Senhor dos Anéis do autor J. R. R. Tolkien, desenvolvido pela Monolith Productions e distribuído pela Warner Bros. Interactive Entertainment.",
            'genero1_id'  => 8,
            'genero2_id'  => 2,
            'plataforma1_id'  => 1,
            'plataforma2_id'  => 4,
            'plataforma3_id'  => 5,
            'desenvolvedora_id'  => 12,
            'lancamento'  => 1506470400,
            'galeria_id' => $galeria->id,
        ]);
        $game->save();


        ////////////////////////////////
        //Resident Evil 7: Biohazard
        
        //galeria
        $galeria = new Galeria([
            'nome'  => "Resident Evil 7: Biohazard",
        ]);
        $galeria->save();

        //media
        $media = new Media([
            'user_id'  => 1,
            'extensao'  => ".jpg",
            'height'  => 10368,
            'width'  => 10368,
            'tamanho'  => 10368,
            'nome_arquivo'  => "5b4fa7162aa25.jpg",
            'url'  => "uploads/5b4fa7162aa25.jpg",
        ]);
        $media->save();

        //galeria_media
        $galeria_media = new GaleriasMedia([
            'galeria_id'  => $galeria->id,
            'media_id'  => $media->id,
            'plataforma_id'  => 4,
            'capa'  => 0
        ]);
        $galeria_media->save();

        //game
        $game = new Game([
            'nome'  => "Resident Evil 7: Biohazard",
            'sinopse'  => "Resident Evil 7: Biohazard, conhecido no Japão como Biohazard 7: Resident Evil é um jogo eletrônico do gênero survival horror produzido pela Capcom e lançado em 24 de janeiro de 2017 para Microsoft Windows, PlayStation 4 e Xbox One, com a versão de PlayStation 4 tendo suporte completo para PlayStation VR.",
            'genero1_id'  => 13,
            'genero2_id'  => 12,
            'plataforma1_id'  => 1,
            'plataforma2_id'  => 4,
            'plataforma3_id'  => 5,
            'desenvolvedora_id'  => 1,
            'lancamento'  => 1485216000,
            'galeria_id' => $galeria->id,
        ]);
        $game->save();


        ////////////////////////////////
        //Assassin's Creed Odyssey

        //galeria
        $galeria = new Galeria([
            'nome'  => "Assassin's Creed Odyssey",
        ]);
        $galeria->save();

        //media
        $media = new Media([
            'user_id'  => 1,
            'extensao'  => ".jpg",
            'height'  => 10368,
            'width'  => 10368,
            'tamanho'  => 10368,
            'nome_arquivo'  => "5c674c9af1.jpg",
            'url'  => "uploads/5c674c9af1.jpg",
        ]);
        $media->save();

        //galeria_media
        $galeria_media = new GaleriasMedia([
            'galeria_id'  => $galeria->id,
            'media_id'  => $media->id,
            'plataforma_id'  => 1,
            'capa'  => 0
        ]);
        $galeria_media->save();

        //game
        $game = new Game([
            'nome'  => "Assassin's Creed Odyssey",
            'sinopse'  => "Assassin's Creed Odissey é um jogo eletrônico de RPG de ação produzido pela Ubisoft Quebec e publicado pela Ubisoft. É o décimo primeiro título principal da série Assassin's Creed e foi lançado em 5 de Outubro de 2018.",
            'genero1_id'  => 13,
            'genero2_id'  => 12,
            'plataforma1_id'  => 1,
            'plataforma2_id'  => 4,
            'plataforma3_id'  => 5,
            'desenvolvedora_id'  => 4,
            'lancamento'  => 1538697600,
            'galeria_id' => $galeria->id,
        ]);
        $game->save();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }

}
