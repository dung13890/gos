<?php

namespace App\Http\Requests\Backend\Warehouses;

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
            'code' => 'required|max:11|min:5|unique:warehouses,code,' . $this->warehouse,
            'name' => 'required|max:50|min:2|unique:warehouses,name,' . $this->warehouse,
        ];
    }
}
