<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password123'), // Password yang di-hash
        ]);

        // User::create([
        //     'name' => 'Jane Doe',
        //     'email' => 'jane.doe@example.com',
        //     'password' => Hash::make('password123'),
        // ]);
    }
}
