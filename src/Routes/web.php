<?php

if (config('automobile.alias')) {
    $alias .= '.';
} else {
    $alias = null;
}

Route::resource($alias.(config('automobile.resource_name') ?: 'automobiles'), 'AutomobilesController');
Route::resource($alias.(config('automobile.type_resource_name') ?: 'automobile-types'), 'AutomobileTypesController', ['only' => ['index']]);
Route::resource($alias.(config('automobile.brand_resource_name') ?: 'automobile-brands'), 'AutomobileBrandsController', ['only' => ['index']]);
Route::resource($alias.(config('automobile.model_resource_name') ?: 'automobile-models'), 'AutomobileModelsController', ['only' => ['index']]);

Route::get($alias.(config('automobile.resource_name') ?: 'automobiles').'/dropdown/{groupBy}', 'S2DropdownsController');
