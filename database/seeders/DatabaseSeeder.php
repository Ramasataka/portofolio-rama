<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Rama Putra',
            'email' => 'ramasataka@gmail.com',
            'password' => bcrypt('karangasem24'),
            'email_verified_at' => now(),
            'email_contanct' => 'ramaputrawibawa24@gmail.com',
            'phone_contanct' => '+6281936221430',
            'github_link' => 'https://github.com/ramasataka',
            'linkedin_link' => 'https://www.linkedin.com/in/i-made-rama-putra-wibawa-54a180250/',
            'role' => 'Back-end Web Developer',
            'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, quae.',
        ]);
    }
}
