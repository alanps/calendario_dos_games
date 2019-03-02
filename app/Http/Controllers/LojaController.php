<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Requests\Loja as LojaRequest;
use Models\Loja;
use Models\Endereco;
use Models\Cidade;
use Models\Bandeira;
use Models\Regiao;
use Models\Uf;
use Helpers\Api;
use Helpers\Decorator;

class LojaController extends Controller
{

    public function index(LojaRequest $request)
    {
        $page_size = $request->page_size ?: 10;

        $decorators = Decorator::include(Loja::class, $request);
        $lojas = Loja::with($decorators)->paginate($page_size);
        return Api::json(true, "Lojas listadas com sucesso.", $lojas);
    }

    public function show(LojaRequest $request, Loja $loja)
    {
        $decorators = Decorator::include(Loja::class, $request);
        $loja->load($decorators);
        return Api::json(true, "Loja listada com sucesso.", $loja);
    }

    public function store(LojaRequest $request)
    {
        $input = $request->all();

        //Loja
        $loja = new Loja($input);

        //Cidade
        $cidade = Cidade::findOrFail($input['endereco']['cidade_id']);

        //Endereço
        $endereco = new Endereco($input['endereco']);
        $endereco->cidade()->associate($cidade);
        $endereco->save();
        $loja->endereco()->associate($endereco);
        
        //Bandeira
        $bandeira = Bandeira::findOrFail($input['bandeira_id']);
        $loja->bandeira()->associate($bandeira);
        
        //Região
        $regiao = Regiao::findOrFail($input['regiao_id']);
        $loja->regiao()->associate($regiao);

        $loja->save();

        return Api::json(true, "Loja cadastrada com sucesso.", $loja);
    }

    public function update(LojaRequest $request, Loja $loja)
    {
        $input = $request->all();

        //Endereco
        if ($request->has('endereco')) {
            $endereco = Endereco::findOrFail($loja->endereco->id);

            if ($request->has('endereco.cidade_id')) {
                $cidade = Cidade::findOrFail($input['endereco']['cidade_id']);
                $endereco->cidade()->associate($cidade);
            }

            $endereco->update($input['endereco']);
        }

        //Bandeira
        if ($request->has('bandeira_id')) {
            $bandeira = Bandeira::findOrFail($input['bandeira_id']);
            $loja->bandeira()->associate($bandeira);
        }
        
        //Região
        if ($request->has('regiao_id')) {
            $regiao = Regiao::findOrFail($input['regiao_id']);
            $loja->regiao()->associate($regiao);
        }

        $loja->update($input);

        return Api::json(true, "Loja atualizada com sucesso.", $loja);
    }

    public function destroy(Loja $loja)
    {
        $loja->delete();
        return Api::json(true, "Loja deletada com sucesso.", $loja);
    }

    public function auxiliarData()
    {
        $selects = array();
        $selects["regioes"] = Regiao::all();
        $selects["bandeiras"] = Bandeira::all();
        $selects["estados"] = Uf:: select(array("id", "nome", "sigla"))->orderBy("nome", "asc")->get();
        return Api::json(true, "Dados auxiliares listados com sucesso.", $selects);
    }
    
}
