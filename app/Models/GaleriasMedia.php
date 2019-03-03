<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GaleriasMedia extends Model
{
    use SoftDeletes;

    protected $table = 'galerias_media';
    
    protected $dateFormat = 'U';
    
    protected $fillable = [
        'galeria_id', 'media_id', 'plataforma_id'
    ];

    protected $hidden = [
        'deleted_at',
        'galeria_id', 'media_id', 'plataforma_id'
    ];

    ///////////////////////
    //decorators
    const decorators = [
        'galeria', 'media', 'plataforma'
    ];

    public function plataforma()
    {
        return $this->belongsTo(Plataforma::class);
    }

    public function galeria()
    {
        return $this->hasOne(Galeria::class);
    }

    public function media()
    {
        return $this->belongsTo(Media::class);
    }

}
