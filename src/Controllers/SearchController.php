<?php

namespace WebHireU\Controllers;

use WebHireU\Core\JobSetup;
use WebHireU\Core\View;
use WebHireU\Services\JobSearch;

class SearchController
{
    public function index(): void
    {
        JobSetup::run();

        $query = trim($_GET['q'] ?? '');
        $location = trim($_GET['location'] ?? '');

        View::render('jobs/search', [
            'jobs' => JobSearch::search($query, $location),
            'query' => $query,
            'location' => $location,
        ]);
    }
}
