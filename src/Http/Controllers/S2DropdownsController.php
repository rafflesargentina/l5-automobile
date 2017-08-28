<?php

namespace RafflesArgentina\Automobile\Http\Controllers;

use Validator;
use Illuminate\Http\Request;

use RafflesArgentina\Automobile\Http\Requests\AutomobileRequest;
use RafflesArgentina\Automobile\Repositories\AutomobileRepository;

class S2DropdownsController
{
    protected $repository;

    public function __construct(AutomobileRepository $repository)
    {
        $this->repository = app()->make(config('automobile.repository') ?: AutomobileRepository::class);
    }

    public function __invoke(Request $request, $groupBy)
    {
        if ($request->wantsJson() || $request->ajax()) {
            $rules = AutomobileRequest::index();

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return response()->json($validator->errors(), 422);
            }

            $items = $this->repository->s2Dropdown($groupBy);
            return response()->json($items, 200);
        }
        return redirect('/');
    }
}
