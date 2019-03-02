<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galeria extends Model
{
    use SoftDeletes;
    
    protected $dateFormat = 'U';
    
    protected $fillable = [
        'nome',
    ];

    protected $hidden = [
        'deleted_at',
    ];

}
