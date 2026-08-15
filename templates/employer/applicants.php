<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Applicants - Web-HireU</title>
<link rel="stylesheet" href="/css/web-hireu.css">
<link rel="stylesheet" href="/css/web-hireu.css"></head>
<body>

<?php require __DIR__ . '/../partials/nav.php'; ?>

<h1>Applicants</h1>

<?php foreach (($applications ?? []) as $application): ?>
<article>
<h2><?= htmlspecialchars($application['title']) ?></h2>
<p><strong><?= htmlspecialchars($application['name']) ?></strong></p>
<p><?= htmlspecialchars($application['email']) ?></p>
<p>Status: <strong><?= htmlspecialchars($application['status']) ?></strong></p>

<form method="post" action="/application/status">
<input type="hidden" name="id" value="<?= (int)$application['id'] ?>">
<select name="status">
<option value="pending">Pending</option>
<option value="accepted">Accepted</option>
<option value="rejected">Rejected</option>
</select>
<button type="submit">Update</button>
</form>
</article>
<?php endforeach; ?>

<?php if (empty($applications)): ?>
<p>No applicants yet.</p>
<?php endif; ?>

</body>
</html>
