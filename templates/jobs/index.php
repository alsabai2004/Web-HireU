<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs - Web-HireU</title>
</head>
<body>

<?php require dirname(__DIR__) . '/partials/nav.php'; ?>

<h1>Find Your Next Job</h1>

<?php foreach ($jobs as $job): ?>
    <article>
        <h2><?= htmlspecialchars($job['title']) ?></h2>
        <p>
            <?= htmlspecialchars($job['company']) ?>
            —
            <?= htmlspecialchars($job['location']) ?>
        </p>

        <a href="/job?id=<?= (int) $job['id'] ?>">
            View Job
        </a>
    </article>
    <hr>
<?php endforeach; ?>

</body>
</html>
