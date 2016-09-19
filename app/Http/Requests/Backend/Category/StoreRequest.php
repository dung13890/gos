<?php

namespace App\Http\Requests\Backend\Category;

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
            'name' => 'required|max:50|min:2|unique:categories',
            'slug' => 'required|max:50|min:2|unique:categories',
            'type' => "required|in:". implode(',',config('gso.typeCategories'))
        ];
    }
}
