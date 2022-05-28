<?php

namespace Database\Seeders;

use App\Models\CarModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CarModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $carModels = [
            [
                'name' => 'R8',
                'code' => 'R8',
                'brand_id' => 1
            ],
            [
                'name' => 'RS 4',
                'code' => 'RS4',
                'brand_id' => 1
            ],

            [
                'name' => 'Accord',
                'code' => 'ACCORD',
                'brand_id' => 2
            ],
            [
                'name' => 'Civic',
                'code' => 'CIVIC',
                'brand_id' => 2
            ],
            [
                'name' => '190 Class (2)',
                'code' => '190_CLASS',
                'brand_id' => 3
            ],
            [
                'name' => '240_CLASS',
                'code' => '240 Class (1)',
                'brand_id' => 3
            ],
            [
                'name' => '200SX',
                'code' => 'NIS200SX',
                'brand_id' => 4
            ],
            [
                'name' => '300ZX',
                'code' => '300ZXTURBO',
                'brand_id' => 4
            ],
            [
                'name' => 'Avalon',
                'code' => 'AVALON',
                'brand_id' => 5
            ],
            [
                'name' => 'Corolla',
                'code' => 'COROL',
                'brand_id' => 5
            ]
        ];

        CarModel::query()->insert($carModels);
    }
}
