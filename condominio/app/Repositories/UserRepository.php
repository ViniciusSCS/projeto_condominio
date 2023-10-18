<?php

namespace App\Repositories;

use App\Models\User;
use Ramsey\Uuid\Uuid;

class UserRepository
{
    public function findMe($uuid)
    {
        return User::with('tipo')->where('uuid', $uuid)->get();
    }

    public function create($data)
    {
        return User::create([
            'uuid' => (string) Uuid::uuid4(),
            'name' => $data['name'],
            'cpf' => $data['cpf'],
            'telefone' => $data['telefone'],
            'tipo_usuario_id' => $data['tipo_usuario_id'],
            'email' => strtolower($data['email']),
            'password' => bcrypt($data['password']),
        ]);
    }
}

