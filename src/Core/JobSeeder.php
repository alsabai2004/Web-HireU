<?php

namespace WebHireU\Core;

use WebHireU\Models\Job;

class JobSeeder
{
    public static function run(): void
    {
        $jobs = [
            [
                'title' => 'PHP Backend Developer',
                'company' => 'Web-HireU',
                'location' => 'Remote',
                'description' => 'Build and maintain modern PHP web applications.',
            ],
            [
                'title' => 'Network Security Engineer',
                'company' => 'Web-HireU',
                'location' => 'Remote',
                'description' => 'Design, monitor and secure enterprise networks.',
            ],
            [
                'title' => 'Frontend Developer',
                'company' => 'Web-HireU',
                'location' => 'Remote',
                'description' => 'Create responsive and modern web interfaces.',
            ],
        ];

        foreach ($jobs as $job) {
            Job::create($job);
        }
    }
}
