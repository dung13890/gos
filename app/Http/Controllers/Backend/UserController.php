<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CategoryRequest;
use App\Contracts\Repositories\UserRepository;
use App\Contracts\Services\UserService;

class UserController extends BackendController
{
    protected $dataSelect = ['id', 'username', 'email'];

    public function __construct(UserRepository $user)
    {
        parent::__construct($user);
    }

    public function getData($items = null)
    {
    	return \Datatables::of($items ? $items : $this->repository->datatables($this->dataSelect))
        ->addColumn('actions', function ($item) {
            $actions = [];
                if ($this->before('show', $item, false)) {
                    $actions['show'] = [
                        'uri' => route($this->repositoryName.'.show', $item->id),
                        'label' => $this->trans('show'),
                    ];
                }
                if ($this->before('edit',$item, false)) {
                    $actions['edit'] = [
                        'uri' => route($this->repositoryName.'.edit', $item->id),
                        'label' => $this->trans('edit'),
                    ];
                }
                if ($this->before('delete',$item, false)) {
                    $actions['delete'] = [
                        'uri' => route($this->repositoryName.'.destroy', $item->id),
                        'label' => $this->trans('delete'),
                    ];
                }

            return $actions;
        })->make(true);
    }

    public function index()
    {
        parent::index();
        return $this->viewRender();
    }

}
