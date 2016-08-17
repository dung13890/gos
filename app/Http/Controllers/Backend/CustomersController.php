<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\CustomerRepository;
use App\Contracts\Services\CustomerService;

class CustomersController extends BackendController
{
    public function __construct(CustomerRepository $customer)
    {
        parent::__construct($customer);
    }

    public function index()
    {
        parent::index();
        return $this->viewRender();
    }

    public function show($id = '')
    {
        parent::show($id);
        return $this->viewRender();
    }
}
