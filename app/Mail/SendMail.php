<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $param;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($param)
    {
        if (isset($param["nome"])){
            $this->param["nome"] = $param["nome"];
        } else if (isset($param["pdf"])){
            $this->param["pdf"] = $param["pdf"];
        }
        $this->param["projeto"] = $param["projeto"];
        $this->param["site"] = $param["site"];
        $this->param["apiurl"] = $param["apiurl"];
        $this->param["subject"] = $param["subject"];
        $this->param["view"] = $param["view"];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        if ($this->param["view"] == "bemvindo"){
            return $this->from('123deevo@bol.com.br', 'Projeto Beholder')
                    ->subject($this->param["subject"])
                    ->view($this->param["view"])
                    ->with(['nome' => $this->param["nome"], 'projeto' => $this->param["projeto"], 'site' => $this->param["site"], 'apiurl' => $this->param["apiurl"]]);
        }

        else if ($this->param["view"] == "pdf"){
            return $this->from('123deevo@bol.com.br', 'Projeto Beholder')
                    ->subject($this->param["subject"])
                    ->view($this->param["view"])
                    ->with(['pdf' => $this->param["pdf"], 'projeto' => $this->param["projeto"], 'site' => $this->param["site"], 'apiurl' => $this->param["apiurl"]])
                    ->attach($this->param["pdf"], [
                        'as' => 'produtos.pdf', 
                        'mime' => 'application/pdf']);
        }
    }

}
