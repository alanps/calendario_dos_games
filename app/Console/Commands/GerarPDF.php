<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Models\Produto;
use Models\Loja;
use Models\Media;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

use Aws\Sns\SnsClient; 
use Aws\Exception\AwsException;

class GerarPDF extends Command
{

    protected $signature = 'gerar:pdf {loja_id} {filtro} {page_size}';
    protected $description = 'Aplicação para Gerar PDF';


    public function handle()
    {
        $page_size = $this->argument('page_size');
        $loja_id = $this->argument('loja_id');
        $filtro = $this->argument('filtro');/*
        $gondola_id = $this->argument('gondola_id');
        $produto_id = $this->argument('produto_id');
        $search = $this->argument('search');*/


        $produtosArray = array();

        if($filtro == "em_ruptura_gondola"){
            $filtro_string = "WHERE status = 1";
        } else if($filtro == "em_transito"){
            $filtro_string = "WHERE status = 2";
        } else if($filtro == "em_ruptura"){
            $filtro_string = "WHERE (status = 1 OR status = 3)";
        } else if($filtro == "em_ruptura_sistemica"){
            $filtro_string = "WHERE status = 3";
        } else if($filtro == "em_loja"){
            $filtro_string = "WHERE status = 0";
        } else {
            $filtro_string = "";
        }

        if(isset($gondola_id)){
            $filtro_gondola = Produto::gondolasGeral($gondola_id, 1);
        } else {
            $filtro_gondola = "";
        }

        $query = "select l.*
                from leituras l
                join (select produto_id, max(created_at) created_at
                      from leituras
                      group by produto_id) l_max
                  on l_max.produto_id = l.produto_id
                 and l_max.created_at = l.created_at 
                ".$filtro_string." AND loja_id=".$loja_id. $filtro_gondola;

        $leituras_em_ruptura = DB::select(
            DB::raw($query)
        );

        foreach ($leituras_em_ruptura as $key => $produto){
            $produtosArray[] = $produto->produto_id;
        }

        $callLoja = Produto::setLoja($loja_id);

        if (isset($produto_id)) {
            $produtos = Produto::where("produtos.id", "=", $produto_id);
        } else {
            $produtos = Produto::whereIn("produtos.id", $produtosArray);
        }

        if(isset($search)){
            $produtos = $produtos->where(function ($produtos) use ($search) {
                $produtos->where("produtos.nome", "LIKE", "%".$search."%")
                        ->orWhere('produtos.id', "LIKE", $search)
                        ->orWhere('produtos.fornecedor_id', "LIKE", $search);
            });
        }

        /*if(isset($gondola_id)){
            $produtos = $produtos->join('produtos_posicoes', 'produtos_posicoes.produto_id', '=', 'produtos.id')->where("produtos_posicoes.gondola_id", "=", $gondola_id)->select('produtos.*', 'produtos_posicoes.gondola_id', 'produtos_posicoes.produto_id', 'produtos_posicoes.ativo');
        }*/

        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        $dataAtual = utf8_encode(ucwords(strftime('%A')).', '.strftime('%d').' de '.ucwords(strftime('%B')).' de '.strftime('%Y'));
        $horaAtual = date('H:i:s');

        $produtos = $produtos->limit($page_size)->get()->toArray();
        $loja = Loja::where("id", "=", $loja_id)->get();

        $prod_pagina = 5;
        $b = 1;
        $pagina = 1;
        $total = 0;
        $divisible = false;
        if(count($produtos) % $prod_pagina === 0){
            $divisible = true;
        }
        if($divisible == true){
            $total = count($produtos) / $prod_pagina;
        } else {
            $total = (count($produtos) / $prod_pagina) + 1;
        }

        $total = intval($total);

        $dados = "";
        $dados .= "<div class='page' style='page-break-before: auto; position: relative;'>";
        $dados .= '<div class="header" style="border-bottom: 1px solid black">';
        $dados .= '<h1>Produtos em Ruptura</h1>';
        $dados .= '<div class="loja" style="float: left; font-size: 0.9em;">'.$loja[0]["nome"].' - '.count($produtos).' produtos em ruptura</div>';
        $dados .= '<div class="data" style="float: right; font-size: 0.9em;">'.$dataAtual.' '.$horaAtual.'</div>';
        $dados .= '<BR><BR>';
        $dados .= '</div>';
        $dados .= "<div class='pagination' style='position:absolute; top: 1em; right: 1em; font-size: 0.7em;'>Pag. 1 de ".$total."</div>";
        $dados .= "<table class='produtos'>";
        for ($i=0; $i < count($produtos); $i++) {

            //if ($produtos[$i]["leituranegativamaisantiga"]){
            //   $emrupturadesde = date('d/m/Y H:i:s', $produtos[$i]["leituranegativamaisantiga"]);
            //} else {
                $emrupturadesde = "N/A";
            //}


            if (isset($produtos[$i]["thumbnail"][0])){
	        	$media = Media::where("id", "=", $produtos[$i]["thumbnail"][0]["id"])->get();
            }
            if (isset($media)){
	            if ($media[0]["url"]) {
	                $mediaUrl = env("FILEAPP_URL").$media[0]["url"];
	            } else {
	                $mediaUrl = env("APP_URL")."/images/no-image.jpg";
	            }
	        } else {
	            $mediaUrl = env("APP_URL")."/images/no-image.jpg";
	        }

            $dados .= '<tr>';
            $dados .= '<td class="image" style="padding: 1em 0;"><img style="border: 2px solid black; height: 7em; width: 7em;" src="'.$mediaUrl.'" /></td>';
            $dados .= '<td class="infos" style="padding: 1em;">';
            $dados .= 'Produto: <b>'.$produtos[$i]["nome"].'</b>';
            $dados .= '<BR>PLU: <b>'.$produtos[$i]["id"].'</b>';
            //$dados .= '<BR>Departamento: '.$produtos[$i]["departamentoinfo"][0]["descricao"];
            //$dados .= '<BR>Grupo: '.$produtos[$i]["grupoinfo"][0]["descricao"];
            $dados .= '<BR>Em ruptura desde: '.$emrupturadesde;
            $dados .= '</td>';
            $dados .= "</tr>";


            if ($i == (count($produtos) - 1)){
                $dados .= "</table>";
                $dados .= "</div>";
                break;
            }


            $conta = $b % $prod_pagina;
            if($conta === 0 && $i > 1){
                $pagina++;
                $dados .= "</table>";
                $dados .= "</div>";
                $dados .= "<div class='page' style='page-break-before: always; position: relative;'>";
                $dados .= "<div class='pagination' style='position:absolute; top: 1em; right: 1em; font-size: 0.7em;'>Pag. ".$pagina." de ".$total."</div>";
                $dados .= "<table class='produtos'>";
            }


            $b++;                

        }


        $dompdf = new DOMPDF();
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->set_option('isRemoteEnabled', true);
        $dompdf->set_option('isJavascriptEnabled', true);
        $dompdf->set_option('isPhpEnabled', true);


        $text_html = "";
        $text_html .= '<div class="pdf" style="font-family: sans-serif;">';
        $text_html .= $dados;
        $text_html .= '</div>';

        $dompdf->load_html($text_html);

        $dompdf->render();
        //$dompdf->stream();
	    $output = $dompdf->output();

	    $time = date("d-m-Y-h-i-s", time());
	    file_put_contents('storage\app\public\uploads\produtos--'.$time.'.pdf', $output);
/*
        $dataMail = [];
        $dataMail["pdf"] = env('FILEAPP_URL').'uploads/produtos--'.$time.'.pdf';
        $dataMail["projeto"] = env('APP_NAME');
        $dataMail["site"] = env('FRONTAPP_URL');
        $dataMail["apiurl"] = env('APP_URL');
        $dataMail["subject"] = "Seu PDF está pronto!";
        $dataMail["view"] = "pdf";
        Mail::to("alanps2012@gmail.com")->send(new SendMail($dataMail));
*/
        $SnSclient = new SnsClient([
            'profile' => 'default',
            'region' => 'us-east-1',
            'version' => '2010-03-31',
            'credentials' => [
                'key'    => 'AKIAI4ZCHZR3GMNGQTNQ',
                'secret' => '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',
            ],
        ]);

        $message = 'Geração do PDF terminou.';
        $topic = 'arn:aws:sns:us-east-1:357245004105:PDFGerado';
        
        try {
            $result = $SnSclient->publish([
                'Message' => $message,
                'TopicArn' => $topic,
            ]);
        } catch (AwsException $e) {
            // output error message if fails
            var_dump($e->getMessage());
            error_log($e->getMessage());
        } 


        exit();

    }

}
