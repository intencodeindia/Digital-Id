<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        $adminId = DB::table('users')->insertGetId([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('dTO9#93h'),
            'role' => 'admin',
            'digital_id' => str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT),
            'status' => true,
            'username' => 'admin',
            'profile_photo' => null,
            'bio' => 'System Administrator',
            'phone' => '+1234567890',
            'relationship' => null,
            'parent_id' => null,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create regular user
        $userId = DB::table('users')->insertGetId([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('dTO9#93h'),
            'role' => 'user',
            'digital_id' => str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT),
            'status' => true,
            'username' => 'user',
            'profile_photo' => null,
            'bio' => 'Regular User Account',
            'phone' => '+1987654321',
            'relationship' => null,
            'parent_id' => null,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create organization user
        $orgId = DB::table('users')->insertGetId([
            'name' => 'Organization',
            'email' => 'org@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('dTO9#93h'),
            'role' => 'organization',
            'digital_id' => str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT),
            'status' => true,
            'username' => 'organization',
            'profile_photo' => null,
            'bio' => 'Organization Account',
            'phone' => '+1122334455',
            'relationship' => null,
            'parent_id' => null,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create employee user
        $employeeId = DB::table('users')->insertGetId([
            'name' => 'Employee User',
            'email' => 'employee@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('dTO9#93h'),
            'role' => 'employee',
            'digital_id' => str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT),
            'status' => true,
            'username' => 'employee',
            'profile_photo' => null,
            'bio' => 'Employee Account',
            'phone' => '+1555666777',
            'relationship' => 'employee',
            'parent_id' => $orgId,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Create family member user
        $familyId = DB::table('users')->insertGetId([
            'name' => 'Family Member',
            'email' => 'family@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('dTO9#93h'),
            'role' => 'familymember',
            'digital_id' => str_pad(mt_rand(0, 999999999999), 12, '0', STR_PAD_LEFT),
            'status' => true,
            'username' => 'family',
            'profile_photo' => null,
            'bio' => 'Family Member Account',
            'phone' => '+1777888999',
            'relationship' => 'spouse',
            'parent_id' => $userId,
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Insert role_user relationships
        $roleUserRelations = [
            [
                'user_id' => $adminId,
                'role_id' => 1, // Admin role
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $userId,
                'role_id' => 2, // User role
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $orgId,
                'role_id' => 3, // Organization role
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $employeeId,
                'role_id' => 4, // Employee role
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $familyId,
                'role_id' => 5, // Family Member role
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('role_user')->insert($roleUserRelations);
    }
}
