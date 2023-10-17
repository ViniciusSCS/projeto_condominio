<?php

namespace App\Services;

use App\Repositories\ApartamentoRepository;

class ApartamentoService
{
    protected $repository;

    public function __construct(ApartamentoRepository $repository)
    {
        $this->repository = $repository;
    }
}

