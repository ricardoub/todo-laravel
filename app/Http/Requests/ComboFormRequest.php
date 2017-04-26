<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComboFormRequest extends FormRequest
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
      'value'      => 'required|numeric',
      'option'     => 'required'
    ];
  }

  public function messages()
  {
    return [
      'name.required'   => 'O campo combo é obrigatório',
      'value.required'  => 'O campo value é obrigatório',
      'value.numeric'   => 'O campo value deve ser numérico',
      'option.required' => 'O campo opção é obrigatório'
    ];
  }
}
