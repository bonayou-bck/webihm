<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // check if an admin-like account already exists
        $existing = User::where('email', 'admin')->orWhere('email', 'admin@example.com')->first();
        if ($existing) {
            $this->command->info('Admin user already exists, skipping.');
            return;
        }

        User::create([
            'name' => 'Admin',
            'email' => 'admin',
            'password' => Hash::make('admin'),
            'role' => 'admin',
        ]);

        $this->command->info('Created dummy admin account: email=admin password=admin');
    }
}
