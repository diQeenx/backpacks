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
            'id' => 1,
            'name' => 'admin'
        ];
        (new Role($data))->save();
        $data = [
            'id' => 2,
            'name' => 'user'
        ];

        (new Role($data))->save();
    }
}
