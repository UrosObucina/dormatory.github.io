<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DamageRequest extends FormRequest
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
            //
            'id_user' => 'required',
            'damage_type' => 'required|max:10',
            'damage_place' => 'required|max:10',
            'damage_description' => 'required',
            'damage_registration'=> 'required',
            'status'=>'required|max:4'

        ];
    }
}
