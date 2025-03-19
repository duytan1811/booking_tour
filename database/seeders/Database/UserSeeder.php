<?php

namespace Database\Seeders\Database;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'username' => 'admin',
                'first_name' => 'admin',
                'password' => Hash::make('123456'),
                'email' => 'mail@drop.cc'
            ]
        ];

        foreach ($users as $user) {
            if (!(User::query()->where('username', $user['username'])->count() > 0)) {
                User::create($user);
                echo "Add username" . $user['username'] . "successfully";
            }
        }
    }
}
