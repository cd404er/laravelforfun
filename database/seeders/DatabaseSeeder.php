<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run package seeder
        $this->call(PackageSeeder::class);

// Seed Sales User
User::create([
    'name' => 'Sales Agent MyRepublic',
    'email' => 'sales@myrepublic.com',
    'password' => Hash::make('password'),
    'role' => 'sales',
]);
    }
}
