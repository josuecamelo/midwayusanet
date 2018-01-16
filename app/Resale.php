<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resale extends Model
{
    protected $fillable = [
        'id',
        'cnpj',
        'inscricao_estadual',
        'razao_social',
        'nome_fantasia',
        'tipo_loja',
        'soube',
        'cep',
        'endereco',
        'complemento',
        'bairro',
        'cidade',
        'uf',
        'nome_contato',
        'email',
        'site',
        'telefone',
        'celular'
    ];
}