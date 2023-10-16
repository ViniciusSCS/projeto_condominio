<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condominio extends Model
{
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
}
