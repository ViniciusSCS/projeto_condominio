<?php

namespace App\Http\Requests;

use App\Services\RuleService;
use Illuminate\Foundation\Http\FormRequest;

class BlocoRequest extends FormRequest
{
    protected $service;

    public function __construct(RuleService $service) {
        $this->service = $service;
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $isProprietario = $this->service->isProprietario();

        return $isProprietario;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'bloco' => 'required|string',
            'condominio' => 'required|string'
        ];
    }

    public function messages()
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'string' => 'O campo :attribute deve ser uma string.'
        ];
    }
}
