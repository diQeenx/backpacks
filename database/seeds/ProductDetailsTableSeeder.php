<?php

use App\Models\Product\ProductDetails;
use Illuminate\Database\Seeder;

class ProductDetailsTableSeeder extends Seeder
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
                'product_id' => 1,
                'color_id' => 1,
                'count' => 20,
                'image' => 'img/product/details/asics.jpeg'
            ],
            [
                'id' => 2,
                'product_id' => 2,
                'color_id' => 2,
                'count' => 10,
                'image' => 'img/product/details/swissgear.jpeg'
            ]
        ];

        foreach ($data as $item) {
            (new ProductDetails($item))->save();
        }
    }
}
