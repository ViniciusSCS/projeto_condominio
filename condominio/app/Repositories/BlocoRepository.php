<?php

namespace App\Repositories;

use App\Models\Bloco;
use Ramsey\Uuid\Uuid;

class BlocoRepository
{
    public function create($data)
    {
        return Bloco::create([
            'id' => (string) Uuid::uuid4(),
            'bloco' => $data['bloco'],
            'descricao' => $data['descricao'],
            'condominio_id' => $data['condominio']
        ]);
    }

    public function list()
    {
        $query = $this->query();

        return $query->paginate(10);
    }

    private function query()
    {
        return Bloco::with(
            'condominio.user',
            'condominio.endereco.cidade.estado'
        );
    }
}

