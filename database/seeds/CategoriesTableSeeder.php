<?php

use Illuminate\Database\Seeder;
use App\Models\Product\Category;

class CategoriesTableSeeder extends Seeder
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
                'name' => 'Женские',
                'image' => 'img/product/category/women.jpg',
            ],
            [
                'id' => 2,
                'name' => 'Унисекс',
                'image' => 'img/product/category/men.jpeg',
            ]
        ];

        foreach ($data as $item) {
            (new Category($item))->save();
        }
    }
}
