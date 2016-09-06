<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AbstractController;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Services\AbstractService;

abstract class ApiController extends AbstractController
{
    protected $guard = 'backend';

    protected $prefix = 'api.v1';

    public function jsonRender($code = 200, $data = [])
    {
    	$compacts = array_merge($data, $this->compacts);
    	if ($code === 200){
    		$compacts['code'] = 200;
    		$compacts['message'] = $this->trans('successfully');
    		return response()->json($compacts);
    	} else {
    		$compacts['success'] = false;
    		return response()->json($compacts, $code);
    	}
    }

    public function index()
    {
    	
    }
}
