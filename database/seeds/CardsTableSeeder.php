<?php

use App\Models\Card;
use Illuminate\Database\Seeder;

class CardsTableSeeder extends Seeder
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
                'name' => 'Visa',
            ],
            [
                'id' => 2,
                'name' => 'MasterCard',
            ],
            [
                'id' => 3,
                'name' => 'American Express',
            ],
            [
                'id' => 4,
                'name' => 'Discover',
            ]
        ];

        foreach ($data as $item) {
            (new Card($item))->save();
        }
    }
}
