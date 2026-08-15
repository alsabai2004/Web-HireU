<?php

namespace WebHireU\Core;

use WebHireU\Models\Category;

class CategorySetup
{
    public static function run(): void
    {
        $db = Database::connection();

        $db->exec(
            'CREATE TABLE IF NOT EXISTS categories (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL UNIQUE
            )'
        );

        $count = (int) $db
            ->query('SELECT COUNT(*) FROM categories')
            ->fetchColumn();

        if ($count === 0) {
            foreach ([
                'Software Development',
                'Networking',
                'Cyber Security',
                'Design',
                'Marketing',
                'Business',
                'Remote Jobs'
            ] as $category) {
                Category::create($category);
            }
        }
    }
}
