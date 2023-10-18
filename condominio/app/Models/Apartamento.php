<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apartamento extends Model
{
    use HasUuids;

    protected $fillable = [
        'id',
        'numero',
        'bloco_id'
    ];

    public function bloco()
    {
        return $this->hasOne(Bloco::class, 'id', 'bloco_id');
    }
}
