<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoFormRequest extends FormRequest
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
         'name'       => 'required',
         'priority'   => 'required|numeric|min:1',
         'percentage' => 'required|numeric|min:0|max:100'
       ];
     }

     public function messages()
     {
       return [
         'name.required'       => 'O campo nome é obrigatório',
         'priority.required'   => 'O campo ordem é obrigatório',
         'priority.numeric'    => 'O campo ordem deve ser numérico',
         'priority.min'        => 'O campo ordem deve ser igual ou maior que 1',
         'percentage.required' => 'O campo opção é obrigatório',
         'percentage.numeric'  => 'O campo porcentage deve ser numérico',
         'percentage.min'      => 'O campo porcentage deve ser igual ou maior que 0',
         'percentage.max'      => 'O campo porcentage deve ser igual ou menor que 100',
       ];
     }
}
