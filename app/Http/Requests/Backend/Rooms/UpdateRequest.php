<?php

namespace App\Http\Requests\Backend\Rooms;

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
            'code' => 'required|max:11|min:5|unique:rooms,code,' . $this->room,
            'name' => 'required|max:50|min:2|unique:rooms,name,' . $this->room,
            'branch_id' => 'required',
            'member' => 'integer|between:0, 100000',
        ];
    }
}
