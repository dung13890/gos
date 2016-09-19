<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    public function type($type)
    {
    	if (!in_array($type, config('gso.typeCategories'))) {
            abort(403);
        }
        $compact['type'] = $type;
        
    	return view('backend.category.index', $compact);
    }
}
