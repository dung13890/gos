<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\RoleRequest;
use App\Model\Role;
use App\Model\Permission;

class RolesController extends BackendController
{
    protected $dataSelect = ['name', 'description'];

    public function __construct(Role $role)
    {
        parent::__construct($role);
    }

    public function ajaxPermission()
    {
        return app(Permission::class)->all()->chunk(2);
    }

    public function index()
    {
        parent::index();
        $this->compacts['items'] = $this->repository->paginate(10);
        
        return $this->viewRender();
    }
}
