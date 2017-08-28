<?php

Route::resource((config('automobile.resource_name') ?: 'automobiles'), 'AutomobilesController');
Route::resource((config('automobile.type_resource_name') ?: 'automobile-types'), 'AutomobileTypesController', ['only' => ['index']]);
Route::resource((config('automobile.brand_resource_name') ?: 'automobile-brands'), 'AutomobileBrandsController', ['only' => ['index']]);
Route::resource((config('automobile.model_resource_name') ?: 'automobile-models'), 'AutomobileModelsController', ['only' => ['index']]);

Route::get((config('automobile.resource_name') ?: 'automobiles').'/dropdown/{groupBy}', 'S2DropdownsController');
