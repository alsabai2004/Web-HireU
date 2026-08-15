<?php

namespace WebHireU\Core;

use WebHireU\Models\Job;

class JobSeeder
{
    public static function run(): void
    {
        $db = Database::connect();

        $user = $db->query(
            'SELECT id FROM users ORDER BY id LIMIT 1'
        )->fetch(\PDO::FETCH_ASSOC);

        if (!$user) {
            $db->prepare(
                'INSERT INTO users (name,email,password) VALUES (?,?,?)'
            )->execute([
                'Web-HireU Demo',
                'demo@web-hireu.com',
                password_hash('WebHireU123', PASSWORD_DEFAULT)
            ]);

            $userId = (int) $db->lastInsertId();
        } else {
            $userId = (int) $user['id'];
        }

        $category = $db->query(
            'SELECT id FROM categories ORDER BY id LIMIT 1'
        )->fetch(\PDO::FETCH_ASSOC);

        $categoryId = $category ? (int) $category['id'] : null;

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
            $job['user_id'] = $userId;
            $job['category_id'] = $categoryId;
            Job::create($job);
        }
    }
}
