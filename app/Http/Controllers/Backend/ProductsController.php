<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\ProductRepository;
use App\Contracts\Services\ProductService;

class ProductsController extends BackendController
{
    public function __construct(ProductRepository $product)
    {
        parent::__construct($product);
    }

    public function index()
    {
        parent::index();
        return $this->viewRender();
    }
}
