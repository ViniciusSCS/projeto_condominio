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

    public function search($request, $userUuid, $isProprietario)
    {
        $query = $this->query($userUuid);

        $query = $this->querySearch($request, $query, $isProprietario);

        return $query->paginate(10);
    }

    private function query($userUuid)
    {
        return Condominio::with(
                'user',
                'user.tipo',
                'endereco.cidade.estado',
                'bloco.apartamento.morador',
                'bloco.apartamento.proprietario'
            )
            ->where('user_id', $userUuid)
            ->whereNull('deleted_at');
    }

    private function querySearch($request, $query, $isProprietario)
    {
        if ($request->has('condominio')) {
            $query->where('condominio', 'LIKE', '%' . $request->condominio . '%');
        }

        if ($request->has('bloco')) {
            $query->whereHas('bloco', function ($query) use ($request) {
                $query->where('bloco', 'LIKE',  '%' . $request->bloco . '%');
            });
        }

        if ($request->has('morador')) {
            $query->whereHas('bloco.apartamento.morador', function ($query) use ($request) {
                $query->where('name', 'LIKE',  '%' . $request->morador . '%');
            });
        }

        if ($request->has('proprietario')) {
            $query->whereHas('bloco.apartamento.proprietario', function ($query) use ($request) {
                $query->where('name', 'LIKE',  '%' . $request->proprietario . '%');
            });
        }

        // if ($request->has('apartamento')) {
        //     $query->whereHas('bloco.apartamento', function ($query) use ($request) {
        //         $query->where('numero', $request->apartamento);
        //     });
        // }

        if ($request->has('logradouro')) {
            $query->whereHas('endereco', function ($query) use ($request) {
                $query->where('logradouro', 'LIKE',  '%' . $request->logradouro . '%');
            });
        }

        if ($request->has('complemento')) {
            $query->whereHas('endereco', function ($query) use ($request) {
                $query->where('complemento', 'LIKE',  '%' . $request->complemento . '%');
            });
        }

        if ($request->has('bairro')) {
            $query->whereHas('endereco', function ($query) use ($request) {
                $query->where('bairro', 'LIKE',  '%' . $request->bairro . '%');
            });
        }

        if ($request->has('cidade')) {
            $query->whereHas('endereco.cidade', function ($query) use ($request) {
                $query->where('nome', 'LIKE',  '%' . $request->cidade . '%');
            });
        }

        if ($request->has('estado')) {
            $query->whereHas('endereco.cidade.estado', function ($query) use ($request) {
                $query->where('nome', 'LIKE',  '%' . $request->estado . '%');
            });
        }

        return $query;
    }
}

