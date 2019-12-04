<?php

use Illuminate\Database\Seeder;
use App\Models\Product\Type;

class TypesTableSeeder extends Seeder
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
                'name' => 'Туристический',
            ],
            [
                'id' => 2,
                'name' => 'Универсальный',
            ]
        ];

        foreach ($data as $item) {
            (new Type($item))->save();
        }
    }
}
