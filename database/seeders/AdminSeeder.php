<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Seed a default admin account so there's a way to log in on a
     * fresh install. Change this password immediately after first login.
     */
    public function run(): void
    {
        Admin::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Site Administrator',
                'password' => 'password',
            ]
        );
    }
}
