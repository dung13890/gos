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
            'member' => 'required|numeric',
            'founding' => 'date',
            'branch_id' => 'required|not_in:0|numeric',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên phòng ban không được bỏ trống',
            'name.min' => 'Tên phòng ban không được nhỏ hơn 2 ký tự',
            'name.max' => 'Tên phòng ban không được lớn hơn 50 ký tự',

            'description.max' => 'Không được vượt quá 200 ký tự',

            'manager.required' => 'Tên trưởng phòng không được bỏ trống',
            'manager.min' => 'Tên trưởng phòng không được nhỏ hơn 2 ký tự',
            'manager.max' => 'Tên trưởng phòng không được lớn hơn 50 ký tự',

            'member.required' => 'Số nhân viên không được bỏ trống',
            'member.numeric' => 'Số nhân viên phải là số nguyên',

            'founding.date' => 'Ngày thành lập không đúng định dạng',

            'branch_id.required' => 'Vui lòng chọn chi nhánh',
        ];
    }
}
