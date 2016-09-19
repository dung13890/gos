<?php

namespace App\Http\Requests\Backend\Location;

use App\Http\Requests\Request;

class UpdateRequest extends Request
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $id = $this->route('location');

        return [
            'code' => 'required|min:5|max:11|unique:locations,code,'.$id,
            'name' => 'required|min:10|max:50|unique:locations,name,'.$id,
            'description' => 'max:200'
        ];
    }
}
