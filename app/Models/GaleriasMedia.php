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
        'nome',
    ];

    protected $hidden = [
        'deleted_at',
    ];

}
