<?php

namespace Helpers;

use \Illuminate\Pagination\LengthAwarePaginator;

class Api {

    public static function json($success=true, $message=null, $data=null, $code=200)
    {

        $conteudo = ['success' => $success];

        if (isset($message)){
            $conteudo += ['message' => $message];
        } else if ($success == false){
            $conteudo += ['message' => "Erro na requisição."];
        } else {
            $conteudo += ['message' => "Sucesso na requisição!"];
        }

        //se for LengthAwarePaginator, ajustar a saída deste componente
        //separar o 'data' dos demais atributos do componente
        if ($data instanceof LengthAwarePaginator) {
            $data_arr = $data->toArray();
            $data = $data_arr['data'];
            unset($data_arr['data']);
            $pagination = $data_arr;
            $conteudo += ['extras' => $pagination];
        }

        if (isset($data)){
            $conteudo += ['data' => $data];
        }

        return response()->json($conteudo, $code);
    }
}
