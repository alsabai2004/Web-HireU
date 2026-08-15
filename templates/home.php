<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Web-HireU - Job & Career Platform</title>
<link rel="stylesheet" href="/css/web-hireu.css">
</head>
<body>

<?php require __DIR__ . '/partials/nav.php'; ?>

<main>
    <section class="hero">
        <h1>Find Your Next Opportunity</h1>
        <p>
            Web-HireU connects talented people with great career opportunities.
        </p>

        <div class="actions">
            <a class="btn" href="/jobs">Browse Jobs</a>
            <a class="btn" href="/search">Search Jobs</a>
        </div>
    </section>

    <section>
        <div class="grid">
            <div class="dashboard-card">
                <h2>Find Jobs</h2>
                <p>Explore available positions and discover your next career opportunity.</p>
                <a class="btn" href="/jobs">Browse Jobs</a>
            </div>

            <div class="dashboard-card">
                <h2>Search</h2>
                <p>Search jobs by title, company, keyword or location.</p>
                <a class="btn" href="/search">Search Jobs</a>
            </div>

            <div class="dashboard-card">
                <h2>For Employers</h2>
                <p>Post job opportunities and connect with qualified candidates.</p>
                <a class="btn" href="/create-job">Post a Job</a>
            </div>
        </div>
    </section>
</main>

</body>
</html>
