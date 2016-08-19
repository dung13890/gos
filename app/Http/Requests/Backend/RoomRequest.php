<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class RoomRequest extends Request
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
            'name' => 'required|min:2|max:50',
            'description' => 'max:200',
            'manager' => 'required|min:2|max:50',
            'member' => 'required|max:5|numeric',
            'founding' => 'date|date_format:dd/mm/YY',
            'branch_id' => 'required|not_in:0|numeric',
        ];
    }
}
