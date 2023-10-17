<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condominio extends Model
{
    use HasUuids;

    protected $fillable = [
        'id',
        'user_id',
        'condominio',
        'endereco_id',
        'deleted_at'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'uuid', 'user_id');
    }

    public function endereco()
    {
        return $this->hasOne(Endereco::class, 'id', 'endereco_id');
    }
}
