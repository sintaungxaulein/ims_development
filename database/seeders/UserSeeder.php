<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create
        (
            [
                'name' => 'omadmin',
                'email' => 'omadmin@thtelemedic.com',
                'password' => Hash::make('admin@n3wTH'),
                'is_active' => true,
            ],
        );
        User::create
        (
            [
                'name' => 'imadmin',
                'email' => 'imadmin@thtelemedic.com',
                'password' => Hash::make('admin@n3wTH'),
                'is_active' => true,
            ],
        );
        User::create
        (
            [
                'name' => 'itadmin',
                'email' => 'itadmin@thtelemedic.com',
                'password' => Hash::make('admin@n3wTH'),
                'is_active' => true,
            ],
        );
        User::create
        (
            [
                'name' => 'normaladmin',
                'email' => 'normaladmin@thtelemedic.com',
                'password' => Hash::make('admin@n3wTH'),
                'is_active' => true,
            ],
        );
        User::create
        (
            [
                'name' => 'nocadmin',
                'email' => 'nocadmin@thtelemedic.com',
                'password' => Hash::make('admin@n3wTH'),
                'is_active' => true,
            ],
        );
    }
}
