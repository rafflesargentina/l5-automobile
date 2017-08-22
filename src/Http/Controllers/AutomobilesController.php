<?php

namespace RafflesArgentina\Automobile\Http\Controllers;

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
    }
}
