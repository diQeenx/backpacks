<?php

use App\Models\Product\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
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
                'category_id' => 1,
                'brand_id' => 1,
                'type_id' => 2,
                'name' => 'Gymsack',
                'size' => '33x41',
                'price' => '15',
            ],
            [
                'id' => 2,
                'category_id' => 2,
                'brand_id' => 2,
                'type_id' => 2,
                'name' => 'SA1155215',
                'size' => '36x23x48',
                'price' => '237',
            ],
        ];

        foreach ($data as $item) {
            (new Product($item))->save();
        }
    }
}
