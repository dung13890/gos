<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AbstractController;
use Illuminate\Database\Eloquent\Model;
use App\Contracts\Services\AbstractService;

abstract class BackendController extends AbstractController
{
    protected $viewPrefix = 'backend.';

    protected $guard = 'backend';

    public function index()
    {
        $this->view = $this->repositoryName . '.index';
        $this->compacts['heading'] = $this->trans('object.index');
        $this->compacts['resource'] = $this->repositoryName;
    }

    public function create()
    {
        $this->view = $this->repositoryName . '.create';
        $this->compacts['heading'] = $this->trans('object.create');
        $this->compacts['resource'] = $this->repositoryName;
    }

    public function show($id)
    {
        $this->view = $this->repositoryName . '.show';
        // $this->compacts['item'] = $this->repository->findOrFail($id);
        $this->compacts['heading'] = $this->trans('object.show');
        $this->compacts['resource'] = $this->repositoryName;
    }

    public function edit($id)
    {
        $this->view = $this->repositoryName . '.edit';
        // $this->compacts['item'] = $this->repository->findOrFail($id);
        $this->compacts['heading'] = $this->trans('object.edit');
        $this->compacts['resource'] = $this->repositoryName;
    }

    public function storeData(array $data, AbstractService $service, $redirect = null, callable $callback = null)
    {
        $this->before(__FUNCTION__);
        try {
            $item = $service->store($data);
            $this->activityLog('create', $item);
            $this->e['message'] = $this->trans('object_created_successfully');
        } catch (\Exception $e) {
            $this->e['code'] = 100;
            $this->e['message'] = $this->trans('object_created_unsuccessfully');
        }
        $redirect = $redirect ? $redirect : route($this->repositoryName . 's' . '.index');
        if (is_callable($callback)) {
            call_user_func_array($callback, [$item]);
        }
        return redirect($redirect)->with('flash_message', json_encode($this->e, true));
    }

    public function updateData(array $data, AbstractService $service, Model $entity, $redirect = null, callable $callback = null)
    {
        $this->before(__FUNCTION__, $entity);
        try {
            $newEntity = $service->update($entity, $data);
            $this->activityLog('edit', $entity);
            $code = 200;
            $this->e['message'] = $this->trans('object_updated_successfully');
        } catch (\Exception $e) {
            $this->e['code'] = 100;
            $code = 401;
            $this->e['message'] = $this->trans('object_updated_unsuccessfully');
        }
        if (\Request::ajax() || \Request::wantsJson()) {
            return [
                'code' => $code,
                'message' => $this->e['message']
            ];
        }
        $redirect = $redirect ? $redirect : route($this->repositoryName . '.index');
        if (is_callable($callback)) {
            call_user_func_array($callback, [$newEntity]);
        }
        return redirect($redirect)->with('flash_message', json_encode($this->e, true));
    }

    public function deleteData(AbstractService $service, Model $entity, $redirect = null)
    {
        $this->before(__FUNCTION__, $entity);
        try {
            $service->delete($entity);
            $this->activityLog('delete', $entity);
            $this->e['message'] = $this->trans('object_deleted_successfully');
        } catch (\Exception $e) {
            $this->e['code'] = 100;
            $this->e['message'] = $this->trans('object_deleted_unsuccessfully');
        }
        if (\Request::ajax() || \Request::wantsJson()) {
            return session()->flash('flash_message', json_encode($this->e, true));
        }
        $redirect = $redirect ? $redirect : route($this->repositoryName . '.index');
        return redirect($redirect)->with('flash_message', json_encode($this->e, true));
    }

    public function destroyData(AbstractService $service, $ids = [], $redirect = null)
    {
        $this->before(__FUNCTION__);
        try {
            $service->destroy($ids);
            $this->activityLog('destroy');
            $this->e['message'] = $this->trans('object_deleted_successfully');
        } catch (\Exception $e) {
            $this->e['code'] = 100;
            $this->e['message'] = $this->trans('object_deleted_unsuccessfully');
        }
        $redirect = $redirect ? $redirect : route($this->repositoryName . '.index');
        if (\Request::ajax() || \Request::wantsJson()) {
            return session()->flash('flash_message', json_encode($this->e, true));
        }
        return redirect($redirect)->with('flash_message', json_encode($this->e, true));
    }
}
