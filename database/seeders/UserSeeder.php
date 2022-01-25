<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin@shopprvault.com',
                'role' => 'admin',
                'profile_pic' => '/images/profile.svg'
            ],
            [
                'name' => 'Customer',
                'email' => 'customer@gmail.com',
                'profile_pic' => '/images/profile.svg'
            ],
            [
                'name' => 'Customer2',
                'email' => 'customer2@gmail.com',
                'approved' => false,
                'profile_pic' => '/images/profile.svg'
            ],
            [
                'name' => 'Customer3',
                'email' => 'customer3@gmail.com',
                'approved' => false,
                'profile_pic' => '/images/profile.svg'
            ],
        ];

        foreach ($users as $user) {
            User::factory()->create($user);
        }
    }
}
