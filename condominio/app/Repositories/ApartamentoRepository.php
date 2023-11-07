<?php

namespace App\Repositories;

use App\Models\Apartamento;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class ApartamentoRepository
{
    public function find($uuid)
    {
        return Apartamento::find($uuid);
    }

    public function validaApartamentoPorBloco($bloco, $numero)
    {
        return Apartamento::where('bloco_id', $bloco)
            ->where('numero', $numero)
            ->exists();
    }

    public function create($data)
    {
        return Apartamento::create([
            'id' => (string) Uuid::uuid4(),
            'numero' => $data['numero'],
            'bloco_id' => $data['bloco'],
            'user_morador' => $data['morador'],
            'user_proprietario' => $data['proprietario']
        ]);

    }

    public function list()
    {
        $query = $this->query();

        return $query->paginate(10);
    }

    private function query()
    {
        return Apartamento::with(
            'morador',
            'proprietario',
            'bloco.condominio.user',
            'bloco.condominio.endereco.cidade.estado'
        );
    }

    public function update()
    {
        //
    }
}

