<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\Game;
use Helpers\Api;
use Helpers\Decorator;

class GameController extends Controller
{

    public function buscarGame(Request $request)
    {
        $page_size = $request->page_size ?: 10;

        $decorators = Decorator::include(Game::class, $request);
        $games = Game::with($decorators); //eager loading

        $nome = $request->nome;
        if(isset($nome)){
            $games = $games->where("nome", "LIKE", "%".$nome."%");
        }

        $orderby = $request->orderby;
        if(isset($orderby)){
            $games = $games->orderby("lancamento", "desc");
        }

        $games = $games->paginate($page_size);

        return Api::json(true, "Games listados com sucesso.", $games);
    }

}
