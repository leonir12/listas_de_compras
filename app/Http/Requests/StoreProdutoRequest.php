<?php

namespace App\Http\Requests;

use App\Services\ProdutoService;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => [
                'required',
                Rule::unique('produtos')->whereNot('ativo', ProdutoService::INATIVO),
                'max:255'
            ],
        ];
    }
}
