<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    private $roles = [
        ['name' => 'admin', 'description' => 'Administrator with full access'],
        ['name' => 'mod', 'description' => 'Moderator with limited administrative access'],
        ['name' => 'author', 'description' => 'Content author'],
        ['name' => 'user', 'description' => 'Regular user']
    ];

    public function run()
    {
        foreach ($this->roles as $role) {
            DB::table('roles')->updateOrInsert(
                ['name' => $role['name']],
                $role
            );
        }
    }
}