<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Employer Dashboard - Web-HireU</title>
<link rel="stylesheet" href="/css/web-hireu.css">
</head>
<body>
<?php require __DIR__ . '/../partials/nav.php'; ?>

<h1>Employer Dashboard</h1>
<a href="/create-job">+ Post New Job</a>

<?php foreach (($jobs ?? []) as $job): ?>
<article>
<h2><?= htmlspecialchars($job['title']) ?></h2>
<p><?= htmlspecialchars($job['company']) ?> —
<?= htmlspecialchars($job['location'] ?? '') ?></p>

<a href="/job?id=<?= (int)$job['id'] ?>">View</a>

<form method="post" action="/employer/delete" style="display:inline">
<input type="hidden" name="id" value="<?= (int)$job['id'] ?>">
<button type="submit">Delete</button>
</form>
</article>
<?php endforeach; ?>

<?php if (empty($jobs)): ?>
<p>You haven't posted any jobs yet.</p>
<?php endif; ?>
</body>
</html>
