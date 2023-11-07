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

    private function validaApartamentoPorBloco($bloco, $numero)
    {
        return Apartamento::where('bloco_id', $bloco)
            ->where('numero', $numero)
            ->exists();
    }

    public function create($data)
    {
        $apartamento = $this->validaApartamentoPorBloco($data['bloco'], $data['numero']);

        if(!$apartamento){
            return Apartamento::create([
                'id' => (string) Uuid::uuid4(),
                'numero' => $data['numero'],
                'bloco_id' => $data['bloco'],
                'user_morador' => $data['morador'],
                'user_proprietario' => $data['proprietario']
            ]);
        }

        return false;

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

