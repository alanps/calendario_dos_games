<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Models\Bandeira;
use Helpers\Api;
use Helpers\Decorator;

class BandeiraController extends Controller
{

    public function index(Request $request)
    {
        $page_size = $request->page_size ?: 10;

        $decorators = Decorator::include(Bandeira::class, $request);
        $bandeiras = Bandeira::with($decorators)->paginate($page_size);
        return Api::json(true, "Bandeiras listadas com sucesso.", $bandeiras);
    }

    public function show(Request $request, Bandeira $bandeira)
    {
        $decorators = Decorator::include(Bandeira::class, $request);
        $bandeira->load($decorators);
        return Api::json(true, "Bandeira listada com sucesso.", $bandeira);
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $bandeira = new Bandeira($input);
        $bandeira->save();

        return Api::json(true, "Bandeira cadastrada com sucesso.", $bandeira);
    }

    public function update(Request $request, Bandeira $bandeira)
    {
        $input = $request->all();
        $bandeira->update($input);

        return Api::json(true, "Bandeira atualizada com sucesso.", $bandeira);
    }

    public function destroy(Bandeira $bandeira)
    {
        $bandeira->delete();
        return Api::json(true, "Bandeira deletada com sucesso.", $bandeira);
    }
    
}
