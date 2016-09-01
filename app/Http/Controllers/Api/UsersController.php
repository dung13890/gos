<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\users\UpdateRequest;


class UsersController extends Controller
{
    public function update(UpdateRequest $request, $id)
    {
        dd($request->all());
    }

    public function show($id)
    {

    }
}
