<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= htmlspecialchars($job['title']) ?> - Web-HireU</title></head>
<body>
<?php require __DIR__ . '/partials/nav.php'; ?>
<h1><?= htmlspecialchars($job['title']) ?></h1>
<h3><?= htmlspecialchars($job['company']) ?></h3>
<p><?= htmlspecialchars($job['location'] ?? '') ?></p>
<p><?= nl2br(htmlspecialchars($job['description'])) ?></p>
<form method="post" action="/apply">
<input type="hidden" name="_csrf" value="<?= WebHireU\Core\Security::csrf() ?>">
<input type="hidden" name="job_id" value="<?= (int)$job['id'] ?>">
<button type="submit">Apply for this Job</button>
</form>
<a href="/jobs">Back to Jobs</a>
</body>
</html>
