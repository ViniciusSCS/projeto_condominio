<?php

namespace App\Services;

use App\Repositories\CondominioRepository;

class CondominioService
{
    protected $repository;

    public function __construct(CondominioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($request)
    {
        $data = $request->all();
        $userUuid = $request->user()->uuid;

        return $this->repository->create($data, $userUuid);
    }

    public function list($request)
    {
        $userUuid = $request->user()->uuid;

        return $this->repository->list($userUuid);
    }

    public function search($request)
    {
        $userUuid = $request->user()->uuid;

        $isProprietario = auth()->user()->tipo->tipo == 'Proprietário';

        return $this->repository->search($request, $userUuid, $isProprietario);
    }
}

