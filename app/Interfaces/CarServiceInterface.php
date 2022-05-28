<?php

namespace App\Interfaces;

interface CarServiceInterface{

    /**
     * @param $filterParams
     * @param $rangeParams
     * @param $sortParams
     * @param $perPageParam
     * @return mixed
     */
    public function getAll($filterParams,$rangeParams,$sortParams,$perPageParam);
}
