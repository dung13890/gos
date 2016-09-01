<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Users\UpdateRequest;
use App\Http\Requests\Backend\Users\ChangePasswordRequest;
use App\Model\User;

class UsersController extends Controller
{
    public function update(UpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json([
            'code' => 200,
            'message' => 'Sửa thành công!',
            'user' => $user,
        ]);
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        $data = $request->only(
            'old_password',
            'password',
            'password_confirmation'
        );
        
        $entity = \Auth::user();
    }
}
