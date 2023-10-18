<?php

namespace App\Repositories;

use App\Models\Apartamento;
use Ramsey\Uuid\Uuid;

class ApartamentoRepository
{
    public function create($data)
    {
        return Apartamento::create([
            'id' => (string) Uuid::uuid4(),
            'numero' => $data['numero'],
            'bloco_id' => $data['bloco']
        ]);
    }

    public function list()
    {
        $query = $this->query();

        return $query->paginate(10);
    }

    private function query()
    {
        return Apartamento::with('bloco.condominio.endereco.cidade.estado', 'bloco.condominio.user');
    }
}

