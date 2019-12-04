<?php

use Illuminate\Database\Seeder;
use App\Models\UserRole;

class UserRolesTable extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'user_id' => 1,
            'role_id' => 1
        ];

        (new UserRole($data))->save();
    }
}
