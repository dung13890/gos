<?php

namespace App\Http\Requests\Backend\Units;

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
            'name' => 'required|max:50|min:2|unique:units,name,' . $this->unit,
            'short_name' => 'required|max:50|min:2|unique:units,short_name,' . $this->unit,
            'description' => 'max:200',
        ];
    }
}
