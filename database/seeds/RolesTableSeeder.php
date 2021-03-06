<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
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
                'name' => 'admin'
            ],
            [
                'id' => 2,
                'name' => 'user'
            ]
        ];

        foreach ($data as $item) {
            (new Role($item))->save();
        }
    }
}
