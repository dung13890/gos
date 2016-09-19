<?php

namespace App\Http\Requests\Backend\CustomerGroups;

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
            'code' => 'required|max:11|min:5|unique:customer_groups,code',
            'name' => 'required|max:50|min:2|unique:customer_groups,name',
        ];
    }
}
