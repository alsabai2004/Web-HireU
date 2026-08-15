<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Web-HireU</title>
</head>
<body>

<?php require dirname(__DIR__) . '/partials/nav.php'; ?>

<h1>Welcome, <?= htmlspecialchars($user['name']) ?></h1>

<p><?= htmlspecialchars($user['email']) ?></p>

<h2>My Applications</h2>

<?php if (!$applications): ?>
    <p>You have not applied for any jobs yet.</p>
    <a href="/jobs">Browse Jobs</a>
<?php else: ?>

<?php foreach ($applications as $application): ?>
    <article>
        <h3><?= htmlspecialchars($application['title']) ?></h3>
        <p><?= htmlspecialchars($application['company']) ?></p>
        <small>
            Applied:
            <?= htmlspecialchars($application['created_at']) ?>
        </small>
    </article>
    <hr>
<?php endforeach; ?>

<?php endif; ?>

</body>
</html>
