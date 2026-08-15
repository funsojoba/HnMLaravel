<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin account (credentials come from .env)
        User::updateOrCreate(
            ['email' => env('ADMIN_EMAIL', 'admin@heartsandmind.org')],
            [
                'name' => env('ADMIN_NAME', 'Admin'),
                'password' => Hash::make(env('ADMIN_PASSWORD', 'change-me-now')),
            ]
        );

        // Sample event (from the current site) — edit or remove in the admin panel.
        Event::firstOrCreate(
            ['title' => 'Back to School Community BBQ', 'event_date' => '2026-08-15'],
            [
                'description' => 'We will be giving out backpacks, school supplies, free BBQ, and a school snack bag for every child (including cereal, cookies and juice).',
                'event_time' => '10:00 AM',
                'location' => 'Manna Help Community Garden, 555 Rossland Rd E, Whitby, ON',
                'is_published' => true,
            ]
        );
    }
}
