<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // TRUE MORA!!!!!!!!!!!!!!
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => "required|max:30",
            'lastname' => "required|max:40",
            'date_of_birth' =>'required|max:10',
            'gender' =>'required',
            'id_Room' => 'required',
            'id_Block' => 'required',
            'id_Floor' => 'required',
            'id_Card' => 'required',
            'id_UserType' => 'required',
            'email' => 'required| unique:user',
            'image_name' => 'required',
            'password' => 'required',
            'college' => 'required|max:80',
            'phone' => 'required|max:11',
            'index_number' => 'required|max:10'
        ];
    }
}
