<?php

namespace Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Media extends Model
{
    use SoftDeletes;
    
    protected $table = 'medias';

    protected $dateFormat = 'U';
    
    protected $fillable = [
        'nome', 'extensao', 'height', 'width', 'nome_arquivo', 'tamanho', 'url', 'user_id'
    ];

    protected $hidden = [
        'deleted_at',
    ];

    ///////////////////////
    //decorators
    const decorators = [
        'user'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
