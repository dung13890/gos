<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class RoleRequest extends Request
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
        if (isset($this->roles))
        {
            return [
                'name' => 'required|min:2|max:50|unique:roles,name,' . $this->roles,
                'description' => 'max:200',
                'perms' => "required",
            ];
        } else {
            return [
                'name' => 'required|min:2|max:50|unique:roles',
                'description' => 'max:200',
                'perms' => "required",
            ];
        }
    }
}
