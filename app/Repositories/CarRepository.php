<?php

namespace App\Repositories;

use App\Interfaces\CarRepositoryInterface;
use App\Models\Car;


class CarRepository implements CarRepositoryInterface
{
    /**
     * @param $filterParams
     * @param $rangeParams
     * @param $sortParams
     * @param $perPageParam
     * @return mixed
     */
    public function getAll($filterParams,$rangeParams,$sortParams,$perPageParam)
    {
       return Car::query()
           ->with('carModel')
           ->filterBy($filterParams,$rangeParams)
           ->sortBy($sortParams)
           ->paginate($perPageParam);
    }
}
