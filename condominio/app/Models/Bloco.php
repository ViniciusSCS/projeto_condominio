<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bloco extends Model
{

    protected $fillable = [
        'id',
        'bloco',
        'descricao',
        'condominio_id',
        'deleted_at'
    ];

    public function condominio()
    {
        return $this->hasOne(Condominio::class, 'id', 'condominio_id');
    }
}
