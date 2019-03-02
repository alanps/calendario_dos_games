<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\Regiao;
use Helpers\Api;
use Helpers\Decorator;

class RegiaoController extends Controller
{

    public function index(Request $request)
    {
        $page_size = $request->page_size ?: 10;

        $decorators = Decorator::include(Regiao::class, $request);
        $regioes = Regiao::with($decorators)->paginate($page_size);
        return Api::json(true, "Regiões listadas com sucesso.", $regioes);
    }

    public function show(Request $request, Regiao $regiao)
    {
        $decorators = Decorator::include(Regiao::class, $request);
        $regiao->load($decorators);
        return Api::json(true, "Região listada com sucesso.", $regiao);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $regiao = new Regiao($input);
        $regiao->save();

        return Api::json(true, "Região cadastrada com sucesso.", $regiao);
    }

    public function update(Request $request, Regiao $regiao)
    {
        $input = $request->all();
        $regiao->update($input);

        return Api::json(true, "Região atualizada com sucesso.", $regiao);
    }

    public function destroy(Regiao $regiao)
    {
        $regiao->delete();
        return Api::json(true, "Região deletada com sucesso.", $regiao);
    }
    
}
