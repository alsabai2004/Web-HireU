<?php

namespace WebHireU\Controllers;

use WebHireU\Core\CategorySetup;
use WebHireU\Core\View;
use WebHireU\Models\Category;

class CategoryController
{
    public function index(): void
    {
        CategorySetup::run();

        View::render('jobs/categories', [
            'categories' => Category::all(),
        ]);
    }
}
