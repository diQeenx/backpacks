<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
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
            'username' => 'admin',
            'email' => 'admin@admin.ru',
            'password' => bcrypt('admin'),
        ];

        (new User($data))->save();
    }
}
