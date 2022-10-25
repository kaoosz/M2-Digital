<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutosCampanhaRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'produto_id' => 'required|exists:produtos,id',
            'campanha_id' => 'required|exists:campanhas,id',
            'produtos_campanha' => 'required|unique:campanha_produtos',           
        ];
    }
}
