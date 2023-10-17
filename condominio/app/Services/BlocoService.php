<?php

namespace App\Services;

use App\Repositories\BlocoRepository;

class BlocoService
{
    protected $repository;

    public function __construct(BlocoRepository $repository)
    {
        $this->repository = $repository;
    }

    public function create($request)
    {
        $data = $request->all();

        return $this->repository->create($data);
    }
}

