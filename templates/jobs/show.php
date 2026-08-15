<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($job['title']) ?> - Web-HireU</title>
</head>
<body>

<?php require dirname(__DIR__) . '/partials/nav.php'; ?>

<h1><?= htmlspecialchars($job['title']) ?></h1>

<h2><?= htmlspecialchars($job['company']) ?></h2>

<p><?= htmlspecialchars($job['location']) ?></p>

<p><?= nl2br(htmlspecialchars($job['description'])) ?></p>

<?php if ($user): ?>
    <form method="POST" action="/jobs/apply">
    <?= \WebHireU\Core\Csrf::field() ?>
        <input type="hidden" name="job_id" value="<?= (int) $job['id'] ?>">
        <button type="submit">Apply Now</button>
    </form>
<?php else: ?>
    <a href="/login">Login to Apply</a>
<?php endif; ?>

</body>
</html>
