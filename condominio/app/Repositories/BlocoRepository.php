<?php

namespace App\Repositories;

use App\Models\Bloco;
use Ramsey\Uuid\Uuid;

class BlocoRepository
{
    public function create($data)
    {
        dd($data);
        return Bloco::create([
            'id' => (string) Uuid::uuid4(),
            'bloco' => $data['bloco'],
            'descricao' => $data['descricao'],
            'condominio_id' => $data['condominio']
        ]);
    }
}

