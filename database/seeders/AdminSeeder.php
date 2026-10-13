<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{

    public function run(): void
    {

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $editorRole = Role::firstOrCreate(['name' => 'editor']);
        $authorRole = Role::firstOrCreate(['name' => 'author']);

        User::updateOrCreate(
            ['email' => 'admin@bnnk.go.id'],
            [
                'name' => 'Admin BNNK',
                'password' => Hash::make('password123'),
                'role_id' => $adminRole->id,
                'email_verified_at' => now(),
                'is_active' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'editor@bnnk.go.id'],
            [
                'name' => 'Editor BNNK',
                'password' => Hash::make('password123'),
                'role_id' => $editorRole->id,
                'email_verified_at' => now(),
                'is_active' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'author@bnnk.go.id'],
            [
                'name' => 'Author BNNK',
                'password' => Hash::make('password123'),
                'role_id' => $authorRole->id,
                'email_verified_at' => now(),
                'is_active' => true,
            ]
        );
    }
}
