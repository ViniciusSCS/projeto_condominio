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

    public function list($userUuid)
    {
        $query = $this->query($userUuid);

        return $query->paginate(10);
    }

    private function query($userUuid)
    {
        return Condominio::with(
                'user',
                'user.tipo',
                'endereco',
                'endereco.cidade.estado',
                'bloco.apartamento'
            )
            ->where('user_id', $userUuid);
    }
}

