<?php

namespace App\Services;

use App\Interfaces\CarRepositoryInterface;
use App\Interfaces\CarServiceInterface;
use App\Models\Car;


class CarService implements CarServiceInterface
{
    /**
     * @var CarRepositoryInterface
     */
    protected $carRepository;

    /**
     * CarService constructor.
     * @param CarRepositoryInterface $carRepository
     */
    public function __construct(CarRepositoryInterface $carRepository)
    {
        $this->carRepository = $carRepository;
    }

    /**
     * @param $filterParams
     * @param $rangeParams
     * @param $sortParams
     * @param $perPageParam
     * @return mixed
     */
    public function getAll($filterParams,$rangeParams,$sortParams,$perPageParam)
    {
       return $this->carRepository->getAll($filterParams,$rangeParams,$sortParams,$perPageParam);
    }

}
