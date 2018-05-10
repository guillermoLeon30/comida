<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class platoRequest extends FormRequest
{
  /**
   * Determine if the user is authorized to make this request.
   *
   * @return bool
   */
  public function authorize(){
    return true;
  }

  /**
   * Get the validation rules that apply to the request.
   *
   * @return array
   */
  public function rules(){
    return [
      'nombre'  =>  'required|string|max:45',
      'menu_id' =>  'required|numeric',
      'precio'  =>  'required|numeric|max:99999999',
      'imagen'  =>  'required|image'
    ];
  }
}
