<?php

namespace RafflesArgentina\Automobile\Http\Controllers;

use RafflesArgentina\ResourceController\ResourceController;

use RafflesArgentina\Automobile\Http\Requests\AutomobileModelRequest;
use RafflesArgentina\Automobile\Repositories\AutomobileModelRepository;

class AutomobileModelsController extends ResourceController
{
    public function __construct()
    {
        $this->module = config('automobile.module');

        $this->repository = config('automobile.model_repository') ?: AutomobileModelRepository::class;

        $this->formRequest = config('automobile.model_form_request') ?: AutomobileModelRequest::class;

        $this->resourceName = config('automobile.model_resource_name') ?: 'models';

        parent::__construct();
    }
}
