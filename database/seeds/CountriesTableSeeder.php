<?php

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountriesTableSeeder extends Seeder
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
                'name' => 'Беларусь',
            ],
            [
                'id' => 2,
                'name' => 'Россия',
            ],
        ];

        foreach ($data as $item) {
            (new Country($item))->save();
        }
    }
}
