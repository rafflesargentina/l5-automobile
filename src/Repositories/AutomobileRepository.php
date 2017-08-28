<?php

namespace RafflesArgentina\Automobile\Repositories;

use Caffeinated\Repository\Repositories\EloquentRepository;

use RafflesArgentina\Automobile\Models\Automobile;

class AutomobileRepository extends EloquentRepository
{
    public $model = Automobile::class;

    protected $tag = 'Automobile';

    public function pluckSources()
    {
        return [
            'I' => 'Importado',
            'N' => 'Nacional',
        ]; 
    }

    public function s2Dropdown($groupBy, string $pageName = null, $perPage = 25)
    {
        $columns = [$groupBy.' as id', $groupBy.' as text'];

        $cacheKey = $this->generateKey([$columns, null]);

        return $this->cacheResults(get_called_class(), __FUNCTION__, $cacheKey, function () use ($columns, $groupBy, $pageName, $perPage) {

            $page = request()->{$pageName ?: 'page'} ?: 1;
            $offset = ($page - 1) * $perPage;

            $items = $this->withoutGlobalScopes()
                          ->groupBy($groupBy)
                          ->filter()
                          ->sorter()
                          ->select($columns)
                          ->skip($offset)
                          ->take($perPage)
                          ->get()
                          ->toArray();

            $count = count($items);
            $endCount = $offset + $perPage;
            $more = $count > $endCount;

            $results = [
                'results' => $items,
                'pagination' => [
                    'more' => $more
                ],
            ];

            return $results;
        });
    }
}
