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

    public function create($request)
    {
        $data = $request->all();

        $apartamento = $this->repository->validaApartamentoPorBloco($data['bloco'], $data['numero']);

        if(!$apartamento){
            return $this->repository->create($data);
        }

        return false;
    }

    public function list()
    {
        return $this->repository->list();
    }

    public function update($request, $uuid)
    {
        $data = $request->all();

        $apartamento = $this->repository->find($uuid);

        $apartamento->update($data);

        return $apartamento;
    }
}

