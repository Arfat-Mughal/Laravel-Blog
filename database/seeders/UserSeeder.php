<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'name' => 'admin',
                'first_name' => 'Super',
                'last_name' => 'Admin',
                'email' => 'admin@laravel-blog.test',
                'website' => 'https://laravel-blog.test',
                'password' => 'password',
                'url' => 'super-admin',
                'roles' => [1] // admin role
            ],
            [
                'name' => 'moderator',
                'first_name' => 'Super',
                'last_name' => 'Moderator',
                'email' => 'mod@laravel-blog.test',
                'website' => 'https://laravel-blog.test',
                'password' => 'password',
                'url' => 'super-moderator',
                'roles' => [2] // mod role
            ],
            [
                'name' => 'author',
                'first_name' => 'Content',
                'last_name' => 'Author',
                'email' => 'author@laravel-blog.test',
                'website' => 'https://laravel-blog.test',
                'password' => 'password',
                'url' => 'content-author',
                'roles' => [3] // author role (if exists)
            ]
        ];

        foreach ($users as $userData) {
            // Check if user already exists by email
            $existingUser = DB::table('users')
                ->where('email', $userData['email'])
                ->first();

            if ($existingUser) {
                // Update existing user
                DB::table('users')
                    ->where('id', $existingUser->id)
                    ->update([
                        'name' => $userData['name'],
                        'first_name' => $userData['first_name'],
                        'last_name' => $userData['last_name'],
                        'website' => $userData['website'],
                        'password' => Hash::make($userData['password']),
                        'url' => $userData['url'],
                        'updated_at' => now(),
                    ]);
                
                $userId = $existingUser->id;
            } else {
                // Create new user
                $userId = DB::table('users')->insertGetId([
                    'name' => $userData['name'],
                    'first_name' => $userData['first_name'],
                    'last_name' => $userData['last_name'],
                    'email' => $userData['email'],
                    'website' => $userData['website'],
                    'password' => Hash::make($userData['password']),
                    'url' => $userData['url'],
                    'email_verified_at' => now(),
                    'created_at' => now(),
                    'updated_at' => now(),
                    'remember_token' => Str::random(10),
                ]);
            }

            // Assign roles to user
            $this->assignRoles($userId, $userData['roles']);
        }
    }

    /**
     * Assign roles to a user, ensuring no duplicates
     */
    private function assignRoles(int $userId, array $roleIds): void
    {
        foreach ($roleIds as $roleId) {
            // Check if role exists
            $roleExists = DB::table('roles')->where('id', $roleId)->exists();
            
            if ($roleExists) {
                // Check if role assignment already exists
                $existingAssignment = DB::table('users_roles')
                    ->where('user_id', $userId)
                    ->where('role_id', $roleId)
                    ->exists();

                if (!$existingAssignment) {
                    DB::table('users_roles')->insert([
                        'user_id' => $userId,
                        'role_id' => $roleId
                    ]);
                }
            }
        }

        // Optional: Remove roles that are not in the provided list
        // DB::table('users_roles')
        //     ->where('user_id', $userId)
        //     ->whereNotIn('role_id', $roleIds)
        //     ->delete();
    }
}