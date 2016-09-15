<?php

namespace App\Http\Requests\Backend\Positions;

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
            'code' => 'required|min:5|max:11|unique:positions,code,' . $this->position,
            'name' => 'required|min:2|max:200|unique:positions,name,' . $this->position
        ];
    }
}
