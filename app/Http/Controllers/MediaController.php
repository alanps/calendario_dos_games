<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Requests\Media as MediaRequest;
use Models\Media;
use Helpers\Api;
use Helpers\Decorator;

class MediaController extends Controller
{

    public function index(Request $request)
    {
        $page_size = $request->page_size ?: 10;

        $decorators = Decorator::include(Media::class, $request);
        $medias = Media::with($decorators)->paginate($page_size);
        return Api::json(true, "Medias listadas com sucesso!", $medias);
    }

    public function show(MediaRequest $request, Media $media)
    {
        $decorators = Decorator::include(Media::class, $request);
        $media->load($decorators);
        return Api::json(true, "Media listada com sucesso.", $media);
    }

    public function store(MediaRequest $request)
    {

        $filename = uniqid();
        $uploadPath = env("FILEAPP_URL");
        $uploadArray = [];

        if ($request->picture_url){

            $url = $request->picture_url;

            $extensao = pathinfo($url, PATHINFO_EXTENSION);
            $uploadArray["tipo_arquivo"] = strtolower($extensao);
            if ($uploadArray["tipo_arquivo"] == 'jpeg') {
                $uploadArray["tipo_arquivo"] = 'jpg';
            }

            $id_nome = ++Media::orderBy('id', 'desc')->limit(1)->first()->id;
            $uploadArray["nome"] = "arquivo#" . str_pad($id_nome, 6, "0", STR_PAD_LEFT);
            $uploadArray["url"] = $url;
            $uploadArray["tamanho"] = 0;
            $uploadArray["nome_arquivo"] = $filename .".". $uploadArray["tipo_arquivo"];

            $tamanho_imagem = getimagesize($url);
            $uploadArray["width"] = $tamanho_imagem[0];
            $uploadArray["height"] = $tamanho_imagem[1];
            $uploadArray["descricao"] = "-";

        } else {

            $file = $request->file('file');

            if ($request->hasFile('file') && $request->file('file')->isValid()) {

                $uploadArray["tipo_arquivo"] = strtolower($request->file->extension());
                if ($uploadArray["tipo_arquivo"] == 'jpeg') {
                    $uploadArray["tipo_arquivo"] = 'jpg';
                }

                $upload = $request->file->storeAs('uploads', $filename.".".$uploadArray["tipo_arquivo"]);

            } else {
                return Api::json(true, "O arquivo enviado é inválido.");
            }

            if ($upload) {

                $id_nome = ++Media::orderBy('id', 'desc')->limit(1)->first()->id;
                $uploadArray["nome"] = "arquivo#" . str_pad($id_nome, 6, "0", STR_PAD_LEFT);
                $uploadArray["url"] = $upload;
                $uploadArray["tamanho"] = $request->file->getClientSize();
                $uploadArray["nome_arquivo"] = $filename .".". $uploadArray["tipo_arquivo"];

                $tamanho_imagem = getimagesize($uploadPath.$upload);
                $uploadArray["width"] = $tamanho_imagem[0];
                $uploadArray["height"] = $tamanho_imagem[1];
                $uploadArray["descricao"] = "-";

            } else {
                return Api::json(true, "Falha ao fazer o upload do arquivo.");
            }

        }

        $media = new Media($uploadArray);
        $media->save();

        return Api::json(true, "Media cadastrada com sucesso.", $media);
    }

    public function update(MediaRequest $request, Media $media)
    {
        $input = $request->all();
        $media->update($input);

        return Api::json(true, "Media atualizada com sucesso.", $media);
    }

    public function destroy(Media $media)
    {
        $media->delete();
        return Api::json(true, "Media deletada com sucesso.", $media);
    }

    public function massDestroy(MediaRequest $request)
    {
        $ids = $request->input("ids");
        foreach ($ids as $id) {
            $media = Media::where('id', '=', $id)->first();
            if ($media) {
                $media->delete();
            }
        }

        return Api::json(true, "Medias deletadas com sucesso.");
    }

}
