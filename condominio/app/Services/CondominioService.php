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
}

