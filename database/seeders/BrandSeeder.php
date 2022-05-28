<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $brands = [
            [
                'name' => 'Audi',
                'code' => 'AUDI'
            ],
            [
                'name' => 'Honda',
                'code' => 'HONDA'
            ],
            [
                'name' => 'Mercedes-Benz',
                'code' => 'MB'
            ],
            [
                'name' => 'Nissan',
                'code' => 'NISSAN'
            ],
            [
                'name' => 'Toyota',
                'code' => 'TOYOTA'
            ],
        ];

        Brand::query()->insert($brands);
    }
}
