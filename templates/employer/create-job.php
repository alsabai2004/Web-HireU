<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Post Job - Web-HireU</title><link rel="stylesheet" href="/css/web-hireu.css"></head>
<body>
<?php require __DIR__ . '/partials/nav.php'; ?>
<h1>Post a Job</h1>
<?php foreach (($errors ?? []) as $error): ?>
<p><?= htmlspecialchars($error) ?></p>
<?php endforeach; ?>
<form method="post">
<input type="hidden" name="_csrf" value="<?= WebHireU\Core\Security::csrf() ?>">
<input name="title" placeholder="Job title" required><br>
<input name="company" placeholder="Company" required><br>
<input name="location" placeholder="Location"><br>
<textarea name="description" placeholder="Job description" required></textarea><br>
<input name="category_id" type="number" placeholder="Category ID"><br>
<button type="submit">Publish Job</button>
</form>
<a href="/dashboard">Back</a>
</body>
</html>
