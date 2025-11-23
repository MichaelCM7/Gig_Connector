<?php

namespace Database\Seeders;

use App\Models\Provider;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class TestUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ... Student User creation (remains the same) ...
        $student = User::create([
            'name' => 'Test Student',
            'email' => 'student@test.com',
            'password' => Hash::make('password'),
            'role' => 'student',
        ]);

        // --- CRITICAL FIX: Provide values for all NOT NULL columns ---
        $student->studentProfile()->create([
            'university' => 'Tech University',
            'year_of_study' => '3rd Year', // REQUIRED
            'field_of_study' => 'Computer Science', // REQUIRED
            'preferred_hours' => 'weekdays', // REQUIRED (as it's an enum and has no default)
        ]);

        // ... Provider User creation (remains the same, but may require similar fixes if the 'providers' table is strict) ...
        $provider = User::firstOrCreate(
            ['email' => 'provider@test.com'], // Using firstOrCreate for safety
            [
                'name' => 'Test Provider Inc.',
                'password' => Hash::make('password'),
                'role' => 'provider',
            ]
        );

        // CRITICAL FIX: Supply the required 'organization_name' field
        if ($provider->wasRecentlyCreated || $provider->wasRecentlyCreated === false) { // Simplified check for safety
            $provider->provider()->firstOrCreate(
                ['user_id' => $provider->id],
                [
                    'provider_type' => 'company',
                    'organization_name' => 'Test Provider HQ', // <--- REQUIRED FIELD ADDED
                ]
            );
        }
    }
}
