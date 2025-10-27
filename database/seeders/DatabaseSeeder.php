<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create viewer user directly
        User::create([
            'name'     => env('VIEWER_NAME', 'Viewer'),
            'email'    => env('VIEWER_EMAIL', 'viewer@gmail.com'),
            'password' => Hash::make(env('VIEWER_PASSWORD', '12345')),
            'status'   => 1, // active
        ]);
    }
}
