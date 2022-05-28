<?php

namespace Tests\Feature;

use App\Http\Resources\CarResource;
use App\Models\Car;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CarShowTest extends TestCase
{
    public function test_show_existing_car()
    {
        $response = $this->get('/api/cars/1');

        $result = CarResource::make(Car::query()->first());

        $data = $result->toResponse([])->getData(true);

        $response->assertStatus(200)->assertExactJson($data);
    }

    public function test_show_not_found_car()
    {
        $response = $this->get('/api/cars/11');

        $response->assertStatus(404);
    }
}
