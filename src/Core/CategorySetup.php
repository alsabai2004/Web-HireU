<?php
namespace WebHireU\Core;

use WebHireU\Models\Category;

final class CategorySetup
{
    public static function run(): void
    {
        foreach ([
            'Information Technology',
            'Software Development',
            'Networking',
            'Cybersecurity',
            'Design',
            'Marketing',
            'Business'
        ] as $category) {
            Category::create($category);
        }
    }
}
