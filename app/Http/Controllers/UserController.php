<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Requests\User as UserRequest;
use Models\Media;
use Models\User;
use Models\Grupo;
use Helpers\Api;
use Helpers\Decorator;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class UserController extends Controller
{

    public function index(Request $request)
    {
        $page_size = $request->page_size ?: 10;

        $decorators = Decorator::include(User::class, $request);
        $usuarios = User::with($decorators)->paginate($page_size);
        return Api::json(true, "Usuários listados com sucesso!", $usuarios);
    }

    public function show(UserRequest $request, User $usuario)
    {
        $decorators = Decorator::include(User::class, $request);
        $usuario->load($decorators);
        return Api::json(true, "Usuário listado com sucesso.", $usuario);
    }

    public function store(UserRequest $request)
    {
        $input = $request->all();
        $usuario = new User($input);
        $usuario->save();

        $dataMail = [];
        $dataMail["nome"] = $input["name"];
        $dataMail["projeto"] = env('APP_NAME');
        $dataMail["site"] = env('FRONTAPP_URL');
        $dataMail["apiurl"] = env('APP_URL');
        $dataMail["subject"] = "Bem vindo!";
        $dataMail["view"] = "bemvindo";
        Mail::to($input["email"])->send(new SendMail($dataMail));

        return Api::json(true, "Usuário cadastrado com sucesso.", $usuario);
    }

    public function update(UserRequest $request, User $usuario)
    {
        $input = $request->all();
        $usuario->update($input);

        return Api::json(true, "Usuário atualizado com sucesso.", $usuario);
    }

    public function destroy(User $usuario)
    {
        $usuario->delete();
        return Api::json(true, "Usuário deletado com sucesso.", $usuario);
    }

    public function massDestroy(UserRequest $request)
    {
        $ids = $request->input("ids");
        foreach ($ids as $id) {
            $usuario = User::where('id', '=', $id)->first();
            if ($usuario) {
                $usuario->delete();
            }
        }

        return Api::json(true, "Usuários deletados com sucesso.");
    }

    public function indexGrupos()
    {
        $grupos = Grupo::all();
        return Api::json(true, "Grupos listados com sucesso.", $grupos);
    }

}
