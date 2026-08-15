<?php
namespace WebHireU\Controllers;

use WebHireU\Core\Response;
use WebHireU\Models\Category;

final class CategoryController
{
    public function index(): void
    {
        Response::view('jobs/categories', [
            'categories' => Category::all()
        ]);
    }
}
