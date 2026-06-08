<?php

namespace Database\Seeders;

use App\Models\Certification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Certification::create([
            'name' => 'Laravel Certified Developer',
            'issuer' => 'Laravel Organization',
            'year' => '2024',
            'description' => 'Demonstrates verified knowledge of advanced application architecture, database configurations, routing, security, and Eloquent design patterns.',
            'image' => 'images/laravel_cert.png',
        ]);

        Certification::create([
            'name' => 'Associate Cloud Engineer',
            'issuer' => 'Google Cloud',
            'year' => '2023',
            'description' => 'Verified skills in deploying applications, monitoring operations, managing enterprise cloud infrastructure, and maintaining security layers in Google Cloud Platform.',
            'image' => 'images/gcp_cert.png',
        ]);

        Certification::create([
            'name' => 'Meta Front-End Developer',
            'issuer' => 'Meta / Coursera',
            'year' => '2022',
            'description' => 'Expertise in developing highly responsive interfaces, utilizing React library elements, component lifecycles, global states, and API consumption standards.',
            'image' => 'images/meta_cert.png',
        ]);
    }
}
