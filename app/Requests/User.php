<?php

namespace Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class User extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    // https://laravel.com/docs/5.7/validation#available-validation-rules
    public function rules()
    {
        //regras gerais
        $rules = ['email' => ['email', 'unique:users,email'],
                  'password' => 'min:6',
                  'grupo_id' => 'numeric',
                  'empresa_id' => 'numeric',
                  'cpf' => ['min:14', 'max:14', 'regex:(^\d{3}\x2E\d{3}\x2E\d{3}\x2D\d{2}$)'],
                  'endereco_id' => 'numeric',
                  'status' => 'max:4',
                  'rg' => ['min:12', 'max:12'],
                  'thumbnail_id' => 'numeric',
                  'loja_id' => 'numeric'
                 ];

        //Se inserção de registro: método 'post'
        if ($this->isMethod('post')) {

            $rules += ['name' => ['required', 'unique:users,name'],
                        'email' => 'required',
                        'password' => 'required',
                        'grupo_id' => 'required',
                        'empresa_id' => 'required',
                        'cpf' => 'required',
                        'endereco_id' => 'required',
                        'observacao' => 'required'
                      ];
        }
        
        //Se atualização de registro: método 'put'
        else {
          $rules += ['name' => 'unique:users,name,'.$this->usuario->id,
                    ];
        }

        return $rules;
    }

    public function messages()
    {
        return [];
    }
}
