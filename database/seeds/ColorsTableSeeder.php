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
                'value' => 'black'
            ],
            [
                'id' => 2,
                'name' => 'Белый',
                'value' => 'white'
            ]
        ];

        foreach ($data as $item) {
            (new Color($item))->save();
        }
    }
}
