<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateImovelRequest extends FormRequest
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
        //$id = $this->segment(2);
        $rules = [
             /*
            'titulo' => ['required','min:3','max:160','unique:imoveis,titulo,{$id},id'] or
            Rule::unique('imoveis')->ignore($id);
            */

            'titulo' => 'required|min:3|max:160',
            'descricao' => ['required','min:5','max:10000'],
            'cep' => 'required|integer|min:8',
            'valor' => ['required','regex:/^\d+(\.\d{1,2})?$/'],
            'status' => [
                Rule::in(['d','a'])],
            'foto' => ['required','image']
        ];

        if($this->method() == 'PUT'){
            $rules['foto'] = ['required','image'];
        }

        return $rules;
    }
}
