<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Requests\Fornecedor as FornecedorRequest;
use Models\Fornecedor;
use Helpers\Api;
use Helpers\Decorator;

class FornecedorController extends Controller
{

    public function index(Request $request)
    {
        $page_size = $request->page_size ?: 10;

        $decorators = Decorator::include(Fornecedor::class, $request);
        $fornecedores = Fornecedor::with($decorators)->paginate($page_size);
        return Api::json(true, "Fornecedores listados com sucesso!", $fornecedores);
    }

    public function show(Request $request, Fornecedor $fornecedor)
    {
        $decorators = Decorator::include(Fornecedor::class, $request);
        $fornecedor->load($decorators);
        return Api::json(true, "Fornecedor listado com sucesso.", $fornecedor);
    }

    public function store(FornecedorRequest $request)
    {
        $input = $request->all();
        $fornecedor = new Fornecedor($input);
        $fornecedor->save();

        return Api::json(true, "Fornecedor cadastrado com sucesso.", $fornecedor);
    }

    public function update(FornecedorRequest $request, Fornecedor $fornecedor)
    {
        $input = $request->all();
        $fornecedor->update($input);

        return Api::json(true, "Fornecedor atualizado com sucesso.", $fornecedor);
    }

    public function destroy(Fornecedor $fornecedor)
    {
        $fornecedor->delete();
        return Api::json(true, "Fornecedor deletado com sucesso.", $fornecedor);
    }

    public function massDestroy(FornecedorRequest $request)
    {
        $ids = $request->input("ids");
        foreach ($ids as $id) {
            $fornecedor = Fornecedor::where('id', '=', $id)->first();
            if ($fornecedor) {
                $fornecedor->delete();
            }
        }

        return Api::json(true, "Fornecedores deletados com sucesso.");
    }

}
