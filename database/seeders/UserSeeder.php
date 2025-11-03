<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Clear tables (optional if you're running seeds repeatedly)
        Role::truncate();
        User::truncate();
        UserRole::truncate();

        $now = now();

        // Seed roles
        $roles = [
            ['name' => 'Developer', 'is_super_power' => 1, 'status' => 1],
            ['name' => 'Super Admin', 'is_super_power' => 1, 'status' => 1],
        ];

        foreach ($roles as $roleData) {
            Role::create(array_merge($roleData, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));
        }

        // Seed users
        $users = [
            [
                'name' => env('ADMIN_NAME', 'Admin User'),
                'email' => env('ADMIN_EMAIL', 'admin@example.com'),
                'password' => Hash::make(env('ADMIN_PASSWORD', '123456')),
                'status' => 1,
            ],
        ];
        $developerRole = Role::where('name', 'Developer')->first();

        foreach ($users as $userData) {
            $user = User::create(array_merge($userData, [
                'created_at' => $now,
                'updated_at' => $now,
            ]));

            // Attach roles to user (assign Developer role to first user)
            if ($developerRole) {
                UserRole::create([
                    'user_id' => $user->id,
                    'role_id' => $developerRole->id,
                    'created_by' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
            }
        }
    }
}
