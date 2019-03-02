<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Game extends Model
{
    use SoftDeletes;
    
    protected $dateFormat = 'U';
    
    protected $fillable = [
        'nome', 'descricao', 'trailer_lancamento', 'trailer_gameplay', 'lancamento',
    ];

    protected $hidden = [
        'deleted_at', 
        'genero1_id', 'genero2_id', 'genero3_id',
        'plataforma1_id', 'plataforma2_id', 'plataforma3_id', 'desenvolvedora_id',
        'galeria_id', 
    ];

    ///////////////////////
    //decorators
    const decorators = [
        'genero1', 'genero2', 'genero3', 'plataforma1', 'plataforma2', 'plataforma3', 'desenvolvedora', 'galeria'
    ];

    public function genero1()
    {
        return $this->belongsTo(Genero::class);
    }

    public function genero2()
    {
        return $this->belongsTo(Genero::class);
    }

    public function genero3()
    {
        return $this->belongsTo(Genero::class);
    }

    public function plataforma1()
    {
        return $this->belongsTo(Plataforma::class);
    }

    public function plataforma2()
    {
        return $this->belongsTo(Plataforma::class);
    }

    public function plataforma3()
    {
        return $this->belongsTo(Plataforma::class);
    }

    public function desenvolvedora()
    {
        return $this->belongsTo(Desenvolvedora::class);
    }

    public function galeria()
    {
        return $this->belongsTo(Galeria::class);
    }

}
