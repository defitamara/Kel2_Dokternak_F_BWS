<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
                'name' => 'Anam',
                'email' => 'mhaerulanam603@gmail.com',
                'is_admin' => '1',
                'password' => bcrypt('12345678'),
            ],
            [
                'name' => 'Defi',
                'email' => 'Defi@gmail.com',
                'is_admin' => '0',
                'password' => bcrypt('12345678'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
