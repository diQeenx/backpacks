<?php

use Illuminate\Database\Seeder;
use App\Models\Product\Brand;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name' => 'Asics',
                'image' => 'img/product/brands/asics.png',
            ],
            [
                'id' => 2,
                'name' => 'SwissGear',
                'image' => 'img/product/brands/swissgear.png',
            ]
        ];

        foreach ($data as $item) {
            (new Brand($item))->save();
        }
    }
}
