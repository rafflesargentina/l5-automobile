<?php

namespace RafflesArgentina\Automobile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use RafflesArgentina\ResourceController\ResourceController;

use RafflesArgentina\Automobile\Http\Requests\AutomobileTypeRequest;
use RafflesArgentina\Automobile\Repositories\AutomobileTypeRepository;

class AutomobileTypesController extends ResourceController
{
    public function __construct()
    {
        $this->module = config('automobile.module');

        $this->repository = config('automobile.type_repository') ?: AutomobileTypeRepository::class;

        $this->formRequest = config('automobile.type_form_request') ?: AutomobileTypeRequest::class;

        $this->resourceName = config('automobile.type_resource_name') ?: 'automobile-types';

        parent::__construct();
    }

    public function index(Request $request)
    {
        $validator = $this->validateRules();

        if ($validator->fails()) {
            return $this->redirectBackWithErrors($validator);
        }

        $items = $this->repository->filter()->sorter()->paginate();
        $view = $this->getViewLocation(__FUNCTION__);
        if (!View::exists($view)) {
            return $this->redirectBackWithViewMissingMessage($view);
        } else {
            return response()->view($view, compact('items'), 200);
        }
    }
}
