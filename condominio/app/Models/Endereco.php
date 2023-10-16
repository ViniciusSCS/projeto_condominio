<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    protected $fillable = [
        'id',
        'cep',
        'logradouro',
        'complemento',
        'cidade_id',
        'deleted_at'
    ];

    public function cidade()
    {
        return $this->hasOne(Cidade::class, 'id', 'cidade_id');
    }
}
