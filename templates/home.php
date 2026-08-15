<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Web-HireU - Modern job and career platform">
    <title>Web-HireU — Jobs & Careers</title>
    <link rel="stylesheet" href="/css/web-hireu.css">
</head>
<body>

<?php require __DIR__ . '/partials/nav.php'; ?>

<main>

<section class="hero">
    <h1>Find Your Next Opportunity</h1>

    <p>
        Discover jobs, connect with companies,
        and build your career with Web-HireU.
    </p>

    <form class="search-box" method="GET" action="/search">
    <?= \WebHireU\Core\Csrf::field() ?>
        <input
            name="q"
            placeholder="Job title or keyword"
            aria-label="Job title or keyword"
        >

        <input
            name="location"
            placeholder="Location"
            aria-label="Location"
        >

        <button type="submit">Search Jobs</button>
    </form>
</section>

<section>
    <h2>Web-HireU</h2>

    <p>
        A modern platform connecting talented people
        with employers and career opportunities.
    </p>

    <a href="/jobs">Browse Jobs</a>
</section>

</main>

</body>
</html>
