<?php

namespace App\Interfaces;

interface CarRepositoryInterface{

    /**
     * @param $filterParams
     * @param $rangeParams
     * @param $sortParams
     * @param $perPageParam
     * @return mixed
     */
    public function getAll($filterParams,$rangeParams,$sortParams,$perPageParam);
}
