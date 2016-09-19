<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Contracts\Services\CategoryService;
use App\Contracts\Repositories\CategoryRepository;
use App\Http\Requests\Backend\Category\StoreRequest;
use App\Http\Requests\Backend\Category\UpdateRequest;
use Illuminate\Support\Str;

class CategoriesController extends ApiController
{
    protected $dataSelect = ['id', 'name', 'slug', 'type'];

    public function __construct(CategoryRepository $category)
    {
        parent::__construct($category);
    }

    public function type(Request $request, $type)
    {
    	return \Datatables::of($this->repository->datatables($this->dataSelect))
        ->filter(function ($instance) use ($request) {
            if ($request->has('name')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['name'], $request->name);
                });
            }

            if ($request->has('slug')) {
                $instance->collection = $instance->collection->filter(function ($row) use ($request) {
                    return Str::contains($row['slug'], $request->slug);
                });
            }
        })
        ->addColumn('actions', function ($item) {
            $actions = [];
                if ($this->before('edit',$item, false)) {
                    $actions['edit'] = true;
                }

                if ($this->before('delete',$item, false)) {
                    $actions['delete'] = true;
                }

            return $actions;
        })->make(true);
    }

    public function store(StoreRequest $request, CategoryService $service)
    {
        $data = $request->all();

        return $this->storeData($data, $service);
    }

    public function edit($id)
    {
    	parent::edit($id);
        $this->compacts['item'];

        return $this->jsonRender(200);
    }

    public function update(UpdateRequest $request, CategoryService $service,  $id)
    {
        $data = $request->all();
        $entity = $this->repository->findOrFail($id);

        return $this->updateData($data, $service, $entity);
    }

    public function destroy($id, CategoryService $service)
    {
        $entity = $this->repository->findOrFail($id);

        return $this->deleteData($service, $entity);
    }
}
