<?php

namespace Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $dateFormat = 'U';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'password', 'thumbnail_id', 'nascimento', 'sexo', 'observacao', 'ultimo_acesso'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'thumbnail_id'
    ];

    ///////////////////////
    //decorators
    const decorators = [
        'thumbnail'
    ];

    public function thumbnail()
    {
        return $this->belongsTo(Media::class);
    }



    public function generateToken()
    {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }


}
