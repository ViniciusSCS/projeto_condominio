<?php

namespace App\Http\Requests;

use App\Services\RuleService;
use Illuminate\Foundation\Http\FormRequest;

class EnderecoRequest extends FormRequest
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
            'cep' => 'required|string|min:9|max:9',
            'logradouro' => 'required|string',
            'complemento' => 'required|string'
        ];
    }

    public function messages(): array
    {
        return [
            'required' => 'O campo :attribute é obrigatório.',
            'string' => 'O campo :attribute deve ser uma string.',
            'max' => 'O campo :attribute deve ter no máximo :max.',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres.'
        ];
    }
}
