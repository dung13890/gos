<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Position;

class PositionsController extends Controller
{
    public function index()
    {
        return response()->json([
            'positions' => Position::all()
        ]);
    }
}
