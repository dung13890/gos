<?php

namespace App\Http\Requests\Backend\Users;

use App\Http\Requests\Request;

class UpdateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $all = $this->all();
        if ( !isset($all['password']) || empty($all['password'])) {
            unset($all['password']);
        }
        $this->replace($all);
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'username' => 'required|alpha_dash|min:3|max:50|unique:users,username,' . $this->user,
            'fullname' => 'required|min:2|max:50',
            'room_ids' => 'required',
            'permission_ids' => 'required',
            'position_id' => 'required',
            'password' => 'alpha_dash|min:6',
            'gender' => 'required',
            'email' => 'required|email|max:255|unique:users,email,' . $this->user,
            'birthday' => 'date_format:d/m/Y|before:tomorrow',
        ];
        
        return $rules;
    }
}
