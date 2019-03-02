<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Requests\Empresa as EmpresaRequest;
use Models\Empresa;
use Helpers\Api;
use Helpers\Decorator;

class EmpresaController extends Controller
{

    public function index(Request $request)
    {
        $page_size = $request->page_size ?: 10;

        $decorators = Decorator::include(Empresa::class, $request);
        $empresas = Empresa::with($decorators)->paginate($page_size);
        return Api::json(true, "Empresas listadas com sucesso!", $empresas);
    }

    public function show(EmpresaRequest $request, Empresa $empresa)
    {
        $decorators = Decorator::include(Empresa::class, $request);
        $empresa->load($decorators);
        return Api::json(true, "Empresa listada com sucesso.", $empresa);
    }

    public function store(EmpresaRequest $request)
    {
        $input = $request->all();
        $empresa = new Empresa($input);
        $empresa->save();

        return Api::json(true, "Empresa cadastrada com sucesso.", $empresa);
    }

    public function update(EmpresaRequest $request, Empresa $empresa)
    {
        $input = $request->all();
        $empresa->update($input);

        return Api::json(true, "Empresa atualizada com sucesso.", $empresa);
    }

    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
        return Api::json(true, "Empresa deletada com sucesso.", $empresa);
    }

    public function massDestroy(EmpresaRequest $request, Empresa $empresa)
    {
        $ids = $request->input("ids");
        foreach ($ids as $id) {
            $empresa = Empresa::where('id', '=', $id)->first();
            if ($empresa) {
                $empresa->delete();
            }
        }

        return Api::json(true, "Empresas deletadas com sucesso.");
    }

}
