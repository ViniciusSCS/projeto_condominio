<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    public $timestamps = false;
    protected $primaryKey = 'codigo_uf';

    protected $fillable = [
        'codigo_uf',
        'uf',
        'nome'
    ];

    public function Cidade()
    {
        return $this->hasMany(Cidade::class, 'codigo_uf');
    }
}
