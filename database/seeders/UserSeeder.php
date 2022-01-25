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
                'role' => 'admin'
            ],
            [
                'name' => 'Customer',
                'email' => 'customer@gmail.com'
            ]
        ];

        foreach ($users as $user) {
            User::factory()->create($user);
        }
    }
}
