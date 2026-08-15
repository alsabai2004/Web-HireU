<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Applications - Web-HireU</title>
</head>
<body>
<?php require __DIR__ . '/partials/nav.php'; ?>
<h1>My Applications</h1>

<?php foreach (($applications ?? []) as $application): ?>
<article>
<h2><?= htmlspecialchars($application['title']) ?></h2>
<p><?= htmlspecialchars($application['company']) ?></p>
<p>Applied: <?= htmlspecialchars($application['created_at']) ?></p>
</article>
<hr>
<?php endforeach; ?>

<?php if (empty($applications)): ?>
<p>You have not applied for any jobs yet.</p>
<?php endif; ?>

<a href="/jobs">Browse Jobs</a> |
<a href="/dashboard">Dashboard</a>
</body>
</html>
