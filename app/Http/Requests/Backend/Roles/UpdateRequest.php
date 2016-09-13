<?php

namespace App\Http\Requests\Backend\Roles;

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
            'name' => 'required|min:2|max:50|unique:roles,name,' . $this->role,
            'permission_ids' => 'required',
            'description' => 'max:200',
        ];
    }
}
