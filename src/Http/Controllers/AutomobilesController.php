<?php

namespace RafflesArgentina\Automobile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use RafflesArgentina\ResourceController\ResourceController;

use RafflesArgentina\Automobile\Http\Requests\AutomobileRequest;
use RafflesArgentina\Automobile\Repositories\AutomobileRepository;

class AutomobilesController extends ResourceController
{
    public function __construct()
    {
        $this->module = config('automobile.module');

        $this->repository = config('automobile.repository') ?: AutomobileRepository::class;

        $this->formRequest = config('automobile.form_request') ?: AutomobileRequest::class;

        $this->resourceName = config('automobile.resource_name') ?: 'automobiles';

        parent::__construct();

        $this->middleware('auth')->except(['index','show']);
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
