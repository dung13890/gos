<?php

namespace App\Http\Requests\Backend\Users;

use App\Http\Requests\Request;

class StoreRequest extends Request
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
            'username' => 'required|alpha_dash|min:3|max:50|unique:users',
            'fullname' => 'required|min:2|max:50',
            'gender' => 'required',
            'room_ids' => 'required',
            'permission_ids' => 'required',
            'position_id' => 'required',
            'email' => 'required|email|max:255|unique:users',
            'birthday' => 'date_format:d/m/Y|before:tomorrow',
            'password' => 'required|alpha_dash|min:6',
            //'image'=> 'image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
        ];
    }
}
