<?php

namespace Database\Seeders;

use App\Models\Dokumen;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('admin'),
            'is_admin' => true,
            'remember_token' => Str::random(10),
        ]);

        User::create([
            'name' => 'User',
            'username' => 'user',
            'password' => Hash::make('user'),
            'is_admin' => false,
            'remember_token' => Str::random(10),
        ]);

        Dokumen::factory(10)->create();
    }
}
