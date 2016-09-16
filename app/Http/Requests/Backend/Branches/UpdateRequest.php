<?php

namespace App\Http\Requests\Backend\Branches;

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
        $all = $this->all();
        if ( !isset($all['status']) || !$all['status']) {
            $all['status'] = false;
        }
        $this->replace($all);
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
            'code' => 'required|max:11|min:5|unique:branches,code,' . $this->branch,
            'name' => 'required|max:50|min:2|unique:branches,name,' . $this->branch,
        ];
    }
}
