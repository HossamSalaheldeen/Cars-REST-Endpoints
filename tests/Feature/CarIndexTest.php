<?php

namespace Tests\Feature;

use App\Http\Resources\CarResource;
use App\Models\Car;
use App\Repositories\CarRepository;
use App\Services\CarService;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Arr;
use Tests\TestCase;

class CarIndexTest extends TestCase
{

    public function test_get_all_cars()
    {
        $response = $this->get('/api/cars');

        $cars = (new CarService(new CarRepository()))->getAll([], [], [], null);

        $result = CarResource::collection($cars);

        $data = $result->toResponse([])->getData(true);

        $response->assertStatus(200)->assertExactJson($data);
    }

    public function test_get_all_cars_with_pagination()
    {
        $perPageParam = 2;

        $response = $this->get('/api/cars?per_page=' . $perPageParam);

        $cars = (new CarService(new CarRepository()))->getAll([], [], [], $perPageParam);

        $result = CarResource::collection($cars);

        $data = $result->toResponse([])->getData(true);

        $response->assertStatus(200)->assertExactJson($data);

    }

    public function test_get_all_cars_with_filter_relationShip_text()
    {
        $filterParams = ['brand' => 'Mercedes-Benz', 'carModel' => '240_CLASS'];

        $response = $this->get('/api/cars?' . Arr::query($filterParams));

        $cars = (new CarService(new CarRepository()))->getAll($filterParams, [], [], null);

        $result = CarResource::collection($cars);

        $data = $result->toResponse([])->getData(true);

        $response->assertStatus(200)->assertExactJson($data);

    }

    public function test_get_all_cars_with_filter_relationShip_value()
    {
        $filterParams = ['brand' => 3, 'carModel' => 6];

        $response = $this->get('/api/cars?' . Arr::query($filterParams));

        $cars = (new CarService(new CarRepository()))->getAll($filterParams, [], [], null);

        $result = CarResource::collection($cars);

        $data = $result->toResponse([])->getData(true);

        $response->assertStatus(200)->assertExactJson($data);

    }

    public function test_get_all_cars_with_filter_relationShip_text_like()
    {
        $filterParams = ['carModel' => 'X'];

        $response = $this->get('/api/cars?' . Arr::query($filterParams));

        $cars = (new CarService(new CarRepository()))->getAll($filterParams, [], [], null);

        $result = CarResource::collection($cars);

        $data = $result->toResponse([])->getData(true);

        $response->assertStatus(200)->assertExactJson($data);

    }

    public function test_get_all_cars_with_filter_relationShip_values_array()
    {
        $filterParams = ['brand' => [3, 1], 'carModel' => [6, 2]];

        $response = $this->get('/api/cars?' . Arr::query($filterParams));

        $cars = (new CarService(new CarRepository()))->getAll($filterParams, [], [], null);

        $result = CarResource::collection($cars);

        $data = $result->toResponse([])->getData(true);

        $response->assertStatus(200)->assertExactJson($data);

    }

    public function test_get_all_cars_with_filter_attributes_value()
    {
        $filterParams = ['color' => '#0099cc'];

        $response = $this->get('/api/cars?' . Arr::query($filterParams));

        $cars = (new CarService(new CarRepository()))->getAll($filterParams, [], [], null);

        $result = CarResource::collection($cars);

        $data = $result->toResponse([])->getData(true);

        $response->assertStatus(200)->assertExactJson($data);

    }

    public function test_get_all_cars_with_filter_attributes_array()
    {

        $filterParams = ['year' => [2007, 1990], 'top_speed' => [200, 160]];

        $response = $this->get('/api/cars?' . Arr::query($filterParams));

        $cars = (new CarService(new CarRepository()))->getAll($filterParams, [], [], null);

        $result = CarResource::collection($cars);

        $data = $result->toResponse([])->getData(true);

        $response->assertStatus(200)->assertExactJson($data);

    }

    public function test_get_all_cars_with_filter_attributes_values()
    {
        $filterParams = ['year' => 2007, 'top_speed' => 160];

        $response = $this->get('/api/cars?' . Arr::query($filterParams));

        $cars = (new CarService(new CarRepository()))->getAll($filterParams, [], [], null);

        $result = CarResource::collection($cars);

        $data = $result->toResponse([])->getData(true);

        $response->assertStatus(200)->assertExactJson($data);

    }

    public function test_get_all_cars_with_filter_attributes_range()
    {
        $rangeParams = ['from' => ['year' => 1900, 'top_speed' => 160], 'to' => ['year' => 2007, 'top_speed' => 240]];

        $response = $this->get('/api/cars?' . Arr::query($rangeParams));

        $cars = (new CarService(new CarRepository()))->getAll([], $rangeParams, [], null);

        $result = CarResource::collection($cars);

        $data = $result->toResponse([])->getData(true);

        $response->assertStatus(200)->assertExactJson($data);

    }

    public function test_get_all_cars_with_filter_sort_attributes_desc()
    {
        $sortUrlParams = ['sort' => ['year,desc', 'top_speed,desc']];

        $sortParams = ['year,desc', 'top_speed,desc'];

        $response = $this->get('/api/cars?' . Arr::query($sortUrlParams));

        $cars = (new CarService(new CarRepository()))->getAll([], [], $sortParams, null);

        $result = CarResource::collection($cars);

        $data = $result->toResponse([])->getData(true);

        $response->assertStatus(200)->assertExactJson($data);

    }

    public function test_get_all_cars_with_filter_sort_attributes_asc()
    {
        $sortUrlParams = ['sort' => ['year', 'top_speed']];

        $sortParams = ['year', 'top_speed'];

        $response = $this->get('/api/cars?' . Arr::query($sortUrlParams));

        $cars = (new CarService(new CarRepository()))->getAll([], [], $sortParams, null);

        $result = CarResource::collection($cars);

        $data = $result->toResponse([])->getData(true);

        $response->assertStatus(200)->assertExactJson($data);

    }
}
