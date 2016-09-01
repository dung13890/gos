<?php

namespace App\Http\Requests\Backend\users;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'username' => "required|alpha_dash|min:4|max:40|unique:users",
            'fullname' => 'required|min:2|max:40',
            'email' => "required|email|max:255|unique:users",
            'password' => 'required|alpha_dash|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
            'birthday' => 'date_format:d/m/Y|before:tomorrow',
            'gender' => 'required',
            'image'=> 'image|mimes:jpeg,jpg,gif,bmp,png|max:1200',
        ];

        return $rules;
    }

    public function response(array $errors)
    {
        return response()->json([
            'errors' => true,
            'messages'  => $errors,
        ], 422);
    }
}
