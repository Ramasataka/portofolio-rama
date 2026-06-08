<?php

namespace Database\Seeders;

use App\Models\Experience;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Experience::create([
            'title' => 'Chairman of Campus Hackathon',
            'organization' => 'Informatics Student Association',
            'start_date' => '2024-05-01',
            'end_date' => '2024-07-31',
            'type' => 'Committee',
            'category' => 'Leadership',
            'description' => 'Managed a team of 30+ students to organize a national-level programming hackathon. Handled event budgets, logistics, sponsor relationships with tech companies, and technical platforms.',
            'skills' => 'Leadership, Event Planning, Public Speaking',
        ]);

        Experience::create([
            'title' => 'Web Developer',
            'organization' => 'Campus Student Union (BEM)',
            'start_date' => '2023-09-01',
            'end_date' => '2024-06-30',
            'type' => 'Member',
            'category' => 'Technical',
            'description' => 'Developed and updated the official student union portal website. Added features for registering student events, publication news boards, and sharing orientation calendars.',
            'skills' => 'Laravel, Tailwind CSS, Git',
        ]);

        Experience::create([
            'title' => 'Staff of Logistics & Equipment',
            'organization' => 'Campus Orientation Week (Ospek)',
            'start_date' => '2022-08-01',
            'end_date' => '2022-09-30',
            'type' => 'Committee',
            'category' => 'Operations',
            'description' => 'Maintained and set up technical hardware, sound routing, and staging configurations for orienting 1000+ newly registered university students.',
            'skills' => 'Logistics, Coordination, Problem Solving',
        ]);
    }
}
