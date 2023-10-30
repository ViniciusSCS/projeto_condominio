<?php

namespace App\Repositories;

use App\Models\Endereco;
use Ramsey\Uuid\Uuid;

class EnderecoRepository
{
    public function create($data)
    {
        return Endereco::create([
            'id' => (string) Uuid::uuid4(),
            'cep' => $data['cep'],
            'logradouro' => $data['logradouro'],
            'complemento' => $data['complemento'],
            'bairro' => $data['bairro'],
            'cidade_id' => $data['cidade']
        ]);

    }
}

