<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Jobs - Web-HireU</title></head>
<body>
<?php require __DIR__ . '/../partials/nav.php'; ?>
<h1>Web-HireU Jobs</h1>
<form method="get">
<input name="q" placeholder="Search jobs..." value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
<button>Search</button>
</form>
<p><a href="/">Home</a> | <a href="/dashboard">Dashboard</a></p>

<?php foreach (($jobs ?? []) as $job): ?>
<article>
<h2><?= htmlspecialchars($job['title']) ?></h2>
<p><?= htmlspecialchars($job['company']) ?> — <?= htmlspecialchars($job['location'] ?? '') ?></p>
<p><?= htmlspecialchars($job['category'] ?? 'General') ?></p>
<a href="/job?id=<?= (int)$job['id'] ?>">View Job</a>
</article>
<hr>
<?php endforeach; ?>

<?php if (empty($jobs)): ?><p>No jobs found.</p><?php endif; ?>
</body>
</html>
