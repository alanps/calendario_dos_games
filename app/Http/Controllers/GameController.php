<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\Game;
use Helpers\Api;
use Helpers\Decorator;

class GameController extends Controller
{

    public function buscarGame(Request $request, Game $game = null)
    {
        $page_size = $request->page_size ?: 10;

        $decorators = Decorator::include(Game::class, $request);
        $games = Game::with($decorators); //eager loading
        
        if(isset($game)){
            $games = $games->where("nome", "LIKE", "%".$game["nome"]."%");
        } else {
            $nome = $request->nome;
            if(isset($nome)){
                $games = $games->where("nome", "LIKE", "%".$nome."%");
            }
        }

        $plataforma = $request->plataforma;
        if(isset($plataforma)){
            $games = $games->where("plataforma", "LIKE", "%".$nome."%");
        }

        $cliques = $request->cliques;
        if(isset($cliques)){
            $games = $games->orderby("cliques", $cliques);
        } else {
            $games = $games->orderby("lancamento", "desc");
        }

        $games = $games->paginate($page_size);

        return Api::json(true, "Games listados com sucesso.", $games);
    }

    public function salvarClique(Request $request, Game $game)
    {
        $cliques = $game->cliques+1;
        $game->update(array('cliques' => $cliques));

        return Api::json(true, "Clique salvo com sucesso.", $game);
    }

}
