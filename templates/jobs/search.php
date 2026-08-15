<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Jobs - Web-HireU</title>
<link rel="stylesheet" href="/css/web-hireu.css"></head>
<body>

<?php require dirname(__DIR__) . '/partials/nav.php'; ?>

<h1>Find Jobs</h1>

<form method="GET" action="/search">
    <?= \WebHireU\Core\Csrf::field() ?>
    <input
        name="q"
        value="<?= htmlspecialchars($query) ?>"
        placeholder="Job title, company or keyword"
    >

    <input
        name="location"
        value="<?= htmlspecialchars($location) ?>"
        placeholder="Location"
    >

    <button type="submit">Search</button>
</form>

<hr>

<?php if (!$jobs): ?>

<p>No jobs found.</p>

<?php else: ?>

<?php foreach ($jobs as $job): ?>

<article>
    <h2><?= htmlspecialchars($job['title']) ?></h2>

    <p>
        <?= htmlspecialchars($job['company']) ?>
        —
        <?= htmlspecialchars($job['location']) ?>
    </p>

    <p><?= htmlspecialchars($job['description']) ?></p>

    <a href="/job?id=<?= (int) $job['id'] ?>">
        View Job
    </a>
</article>

<hr>

<?php endforeach; ?>

<?php endif; ?>

</body>
</html>
