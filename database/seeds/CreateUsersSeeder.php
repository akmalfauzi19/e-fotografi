<?php

use Illuminate\Database\Seeder;
use App\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Aristo',
                'email' => 'Aristofotografi7@gmail.com',
                'is_admin' => '1',
                'password' => bcrypt('123'),
            ],
            [
                'name' => 'User',
                'email' => 'user@user.com',
                'is_admin' => '0',
                'password' => bcrypt('123'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
