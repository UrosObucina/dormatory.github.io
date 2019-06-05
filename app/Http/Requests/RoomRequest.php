<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
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
            // polja koja se nalaze u bazi
            "room_number"=>"required,max:3",
            "id_Floor"=>"required:max:11",
            "id_User"=>'required'
        ];
    }
}
