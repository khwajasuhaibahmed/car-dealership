<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Admin User for Elite Motors
        User::updateOrCreate(
            ['email' => 'admin@elitemotors.com'],
            [
                'name' => 'Elite Admin',
                'password' => Hash::make('admin123'),
                'role' => 'admin',
                'is_approved' => true,
                'email_verified_at' => now(),
            ]

        );

        // No regular users seeded - allowing manual registration as requested

        $this->call(CarSeeder::class);
    }
}
