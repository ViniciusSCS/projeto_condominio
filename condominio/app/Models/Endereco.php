<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasUuids;
    protected $primary = 'id';

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
