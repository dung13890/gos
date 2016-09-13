<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\UserRequest;
use App\Http\Requests\Backend\ProfileRequest;
use App\Http\Requests\Backend\PasswordRequest;
use App\Contracts\Repositories\UserRepository;
use App\Contracts\Repositories\BranchRepository;
use App\Contracts\Services\UserService;

class UserController extends BackendController
{
    protected $dataSelect = ['id', 'username', 'email', 'phone'];

    protected $branchRepository;

    public function __construct(UserRepository $user, BranchRepository $branch)
    {
        parent::__construct($user);
        $this->branchRepository = $branch;
    }

    public function ajaxProfile()
    {
        return \Auth::user();
    }

    public function updateProfile(ProfileRequest $request, UserService $service)
    {
        $data = $request->only('fullname', 'image', 'gender', 'phone', 'address', 'birthday');
        if (!$data['image']) {
            unset($data['image']);
        }
        $entity = \Auth::user();

        return $this->updateData($data, $service, $entity);
    }

    public function updatePassword(PasswordRequest $request, UserService $service)
    {
        $data = $request->only('old_password', 'password', 'password_confirmation');
        $entity = \Auth::user();
        if (\Hash::check($data['old_password'], \Auth::user()->password)) {

            return $this->updateData($data, $service, $entity);
        }

        return response()->json(['code' => '401', 'message' => 'Mật khẩu không đúng']);
    }

    public function getData($items = null)
    {
        return \Datatables::of($items ? $items : $this->repository->datatables($this->dataSelect, ['rooms']))
            ->addColumn('rooms', function ($item) {
                return $item->rooms->map(function ($room) {
                    return '<span class="label label-primary">' . $room->name . '</span>';
            })->implode(' ');
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

    public function getDataWithRoom($room)
    {
        $this->before('index');
        $room = app(\App\Model\Room::class)->findOrFail($room);
        $items = $room->users()->with('rooms')->get($this->dataSelect);

        return $this->getData($items);
    }

    public function renderResource($action = 'create')
    {
        $this->compacts['action'] = $this->trans("object.{$action}");
        $this->compacts['listHeading'] = $this->trans("object.list");
        $this->compacts['button'] = $this->trans($action);
        $this->compacts['listBrands'] = $this->branchRepository->all()->pluck('name', 'id')->prepend('Thuộc chi nhánh');
        $this->compacts['listRooms'] = app(\App\Model\Room::class)->all()->pluck('name', 'id')->prepend('Vị trí hiện tại');
        $this->view = $this->repositoryName . '.index';

        return $this->viewRender();
    }

    public function index()
    {
        parent::index();

        return $this->renderResource();
    }

    public function room($room)
    {
        $this->before('index');
        $this->compacts['room'] = app(\App\Model\Room::class)->findOrFail($room);

        return $this->renderResource();
    }

    public function store(UserRequest $request, UserService $service)
    {
        $this->before(__FUNCTION__);
        $data = $request->all();

        return $this->storeData($data, $service);
    }

    public function edit($id)
    {
        parent::edit($id);

        return $this->renderResource('edit');
    }

    public function update(UserRequest $request, UserService $service, $id)
    {
        $data = $request->all();
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
