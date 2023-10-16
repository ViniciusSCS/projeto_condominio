<?php

namespace App\Repositories;

use App\Models\Condominio;
use Ramsey\Uuid\Uuid;

class CondominioRepository
{
    public function create($data, $userUuid)
    {
        return Condominio::create([
            'id' => (string) Uuid::uuid4(),
            'user_id' => $userUuid,
            'condominio' => $data['condominio'],
            'endereco_id' => $data['endereco'],
        ]);
    }
}

