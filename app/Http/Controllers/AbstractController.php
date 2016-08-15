<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Activity;

abstract class AbstractController extends Controller
{
    protected $repository;

    protected $repositoryName;

    protected $user;

    protected $compacts;

    protected $view;

    protected $dataSelect = ['*'];

    protected $lang = array(
        'prefix' => 'repositories.',
        'replacements' => array(),
    );

    protected $e = array(
        'code' => 0,
        'message' => null,
    );

    public function __construct($repository = null)
    {
        if ($repository) {
            $this->repositorySetup($repository);
        }
        $this->lang['replacements'] = [
            'object' => $this->trans($this->repositoryName),
        ];
        $this->user = Auth::guard($this->getGuard())->user();
    }

    public function repositorySetup($repository = null)
    {
        $this->repository = $repository;
        $this->repositoryName = strtolower(class_basename($this->repository->getModel()));
    }

    protected function getGuard()
    {
        return property_exists($this, 'guard') ? $this->guard : null;
    }

    public function trans($str = null, $data = [])
    {
        $replacements = array_merge($data, $this->lang['replacements']);
        
        return trans($this->lang['prefix'].$str, $replacements);
    }

    public function activityLog($actions, $item = null, $message = null)
    {
        $userName = $this->user->name;
        $itemName = ($item && isset($item->name) )  ? $item->name : '';
        Activity::log( $message ? $message : $userName . ' đã ' . $this->trans('object.' . $actions) . ' ' . $itemName );
    }

    public function viewRender($data = [], $view = null)
    {
        $view = $view ? $view : $this->view;
        $compacts = array_merge($data, $this->compacts);

        return view($this->viewPrefix.$view, $compacts);
    }
}
