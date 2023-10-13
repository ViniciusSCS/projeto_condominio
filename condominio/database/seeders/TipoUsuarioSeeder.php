<?php

namespace Database\Seeders;

use App\Models\TipoUsuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Ramsey\Uuid\Uuid;

class TipoUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipos = [
            [
                'id' => Uuid::uuid4()->toString(),
                'tipo' => 'Inquilino'
            ],
            [
                'id' => Uuid::uuid4()->toString(),
                'tipo' => 'Proprietário'
            ]
        ];

        foreach ($tipos as $tipo) {
            TipoUsuario::UpdateOrCreate($tipo, $tipo);
        }
    }
}
