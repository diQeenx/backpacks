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
            ],
            [
                'id' => 2,
                'product_id' => 2,
                'color_id' => 2,
                'count' => 10,
            ]
        ];

        foreach ($data as $item) {
            (new ProductDetails($item))->save();
        }
    }
}
