<?php

use App\Models\Product\Color;
use Illuminate\Database\Seeder;

class ColorsTableSeeder extends Seeder
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
                'name' => 'Черный',
            ],
            [
                'id' => 2,
                'name' => 'Белый',
            ]
        ];

        foreach ($data as $item) {
            (new Color($item))->save();
        }
    }
}
