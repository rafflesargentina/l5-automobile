<?php

namespace RafflesArgentina\Automobile\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

use RafflesArgentina\ResourceController\ResourceController;

use RafflesArgentina\Automobile\Http\Requests\AutomobileBrandRequest;
use RafflesArgentina\Automobile\Repositories\AutomobileBrandRepository;

class AutomobileBrandsController extends ResourceController
{
    public function __construct()
    {
        $this->module = config('automobile.module');

        $this->repository = config('automobile.brand_repository') ?: AutomobileBrandRepository::class;

        $this->formRequest = config('automobile.brand_form_request') ?: AutomobileBrandRequest::class;

        $this->resourceName = config('automobile.brand_resource_name') ?: 'automobile-brands';

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
