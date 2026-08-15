<?php

namespace WebHireU\Core;

use WebHireU\Models\Job;

class JobSeeder
{
    public static function run(): void
    {
        Job::create(
            'PHP Backend Developer',
            'Web-HireU',
            'Remote',
            'Build and maintain modern PHP web applications.'
        );

        Job::create(
            'Network Security Engineer',
            'Web-HireU',
            'Remote',
            'Design, monitor and secure enterprise networks.'
        );

        Job::create(
            'Frontend Developer',
            'Web-HireU',
            'Remote',
            'Create responsive and modern web interfaces.'
        );
    }
}
