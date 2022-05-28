<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\IndexCarRequest;
use App\Http\Resources\CarResource;
use App\Interfaces\CarServiceInterface;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * @var CarServiceInterface
     */
    protected $carService;

    /**
     * CarController constructor.
     * @param CarServiceInterface $carService
     */
    public function __construct(CarServiceInterface $carService)
    {
        $this->carService = $carService;
    }

    /**
     * Display a listing of the resource.
     *
     * @param IndexCarRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(IndexCarRequest $request)
    {

        $filterParams = $request->safe()->only('carModel', 'brand', 'year', 'top_speed', 'color');
        $rangeParams = $request->safe()->only('from', 'to');

        $sortParams = [];
        if ($request->safe()->has('sort')) {
            $sortParams = $request->safe()['sort'];
        }

        $perPageParam = null;
        if ($request->safe()->has('per_page')) {
            $perPageParam = $request->safe()['per_page'];
        }

        $cars = $this->carService->getAll($filterParams,$rangeParams, $sortParams, $perPageParam);
        return CarResource::collection($cars);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Car $car
     * @return CarResource
     */
    public function show(Car $car)
    {
        return CarResource::make($car);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Car $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        //
    }
}
