<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class PasswordRequest extends Request
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
            'old_password' => 'required|alpha_dash|min:6',
            'password' => 'required|alpha_dash|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ];
    }
}
