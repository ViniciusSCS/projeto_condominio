<?php

namespace App\Services;

class RuleService
{
    public function isProprietario()
    {
        $isProprietario = auth()->user()->tipo->tipo == 'Proprietário';

        if($isProprietario == false){
            $this->failedAuthorization();
        }

        return $isProprietario;
    }

    private function failedAuthorization()
    {
        $message = 'Você não tem permissão para acessar esta funcionalidade.';
        abort(403, $message);
    }
}

