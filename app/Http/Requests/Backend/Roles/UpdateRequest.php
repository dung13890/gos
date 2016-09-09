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
            'permissions_checked' => 'required',
            'description' => 'max:200',
        ];
    }

    public function messages()
    {
        
        return [
            'name.max' => 'Tên không vượt quá 50 kí tự',
            'description.max' => 'Mô tả không vượt quá 200 kí tự',
            'permissions_checked.required' => 'Bạn chưa chọn quyền',
        ];
    }
}
