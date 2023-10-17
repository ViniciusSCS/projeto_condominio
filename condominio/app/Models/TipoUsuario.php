<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasUuids;

    protected $fillable = [
        'id',
        'tipo'
    ];
}
