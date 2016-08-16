<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\UserRequest;
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
        return \Datatables::of($items ? $items : $this->repository->datatables($this->dataSelect, ['rooms']))
        ->addColumn('rooms', function ($item) {
            return '<span class="label label-primary">' . 'abad'. '</span> ';
        })
        ->addColumn('actions', function ($item) {
            $actions = [];
                if ($this->before('show', $item, false)) {
                    $actions['show'] = [
                        'uri' => route($this->repositoryName . '.show', $item->id),
                        'label' => $this->trans('show'),
                    ];
                }
                if ($this->before('edit',$item, false)) {
                    $actions['edit'] = [
                        'uri' => route($this->repositoryName . '.edit', $item->id),
                        'label' => $this->trans('edit'),
                    ];
                }
                if ($this->before('delete',$item, false)) {
                    $actions['delete'] = [
                        'uri' => route($this->repositoryName . '.destroy', $item->id),
                        'label' => $this->trans('delete'),
                    ];
                }

            return $actions;
        })->make(true);
    }

    public function renderResource($action = 'create')
    {
        $this->compacts['action'] = $this->trans($action);
        $this->view = $this->repositoryName . '.index';

        return $this->viewRender();
    }

    public function index()
    {
        parent::index();

        return $this->renderResource();
    }

    public function store(UserRequest $request, UserService $service)
    {
        $this->before(__FUNCTION__);
        $data = $request->only($this->repository->getFillable());

        return $this->storeData($data, $service);
    }

    public function edit($id)
    {
        parent::edit($id);

        return $this->renderResource('edit');
    }

    public function update(UserRequest $request, UserService $service, $id)
    {
        $data = $request->only($this->repository->getFillable());
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);

        return $this->updateData($data, $service, $entity);
    }

    public function destroy(UserService $service, $id)
    {
        $entity = $this->repository->findOrFail($id);
        $this->before(__FUNCTION__, $entity);
        return $this->deleteData($service, $entity);
    }

}
