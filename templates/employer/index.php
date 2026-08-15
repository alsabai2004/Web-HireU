<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employer - Web-HireU</title>
</head>
<body>

<?php require dirname(__DIR__) . '/partials/nav.php'; ?>

<h1>Employer Center</h1>

<?php if (!$employer): ?>

<form method="POST" action="/employer">
    <?= \WebHireU\Core\Csrf::field() ?>
    <input name="company" placeholder="Company name" required>
    <textarea name="description" placeholder="Company description" required></textarea>
    <button type="submit">Create Company</button>
</form>

<?php else: ?>

<h2><?= htmlspecialchars($employer['company']) ?></h2>

<p><?= htmlspecialchars($employer['description']) ?></p>

<a href="/employer/jobs/create">Post a Job</a>

<?php endif; ?>

</body>
</html>
