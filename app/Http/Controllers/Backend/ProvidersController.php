<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Contracts\Repositories\ProviderRepository;
use App\Contracts\Services\ProviderService;

class ProvidersController extends Controller
{
    public function __construct(ProviderRepository $provider)
    {
        parent::__construct($provider);
    }

    public function index()
    {
        parent::index();
        return $this->viewRender();
    }
}
