<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class Request extends FormRequest
{
    public function response(array $errors)
    {
        return response()->json([
            'errors' => true,
            'messages'  => $errors,
        ], 422);
    }

    public function messages()
    {
        return [
            'username.required' => 'Tài khoản không được bỏ trống',
            'username.unique' => 'Tài khoản đã tồn tại',
            'username.alpha_dash' => 'Tài khoản không được chứa kí tự đặc biệt',
            'username.min' => 'Tài khoản phải từ 2 ký tự trở lên',
            'username.max' => 'Tài khoản không vượt quá 50 kí tự',
            
            'fullname.required' => 'Họ và tên không được bỏ trống',
            'fullname.min' => 'Họ và tên phải từ 2 ký tự trở lên',
            'fullname.max' => 'Họ và tên không vượt quá 50 kí tự',

            'permission_ids.required' => 'Nhóm quyền quản trị không được bỏ trống',
            'room_ids.required' => 'Phòng ban không được bỏ trống',
            'role_ids.required' => 'Quyền quản trị không được bỏ trống',

            'phone.numeric' => 'Điện thoại phải là định dạng số',
            
            'gender.required' => 'Vui lòng chọn giới tính',

            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            
            'birthday.date_format' => 'Ngày sinh không đúng định dạng',
            'birthday.before' => 'Ngày sinh không được lớn hơn ngày hiện tại',
        ];
    }
}

