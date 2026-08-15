<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Categories - Web-HireU</title>
</head>
<body>
<?php require __DIR__ . '/partials/nav.php'; ?>
<h1>Job Categories</h1>

<?php foreach (($categories ?? []) as $category): ?>
<p>
<a href="/jobs?q=<?= urlencode($category['name']) ?>">
<?= htmlspecialchars($category['name']) ?>
</a>
</p>
<?php endforeach; ?>

<a href="/jobs">All Jobs</a>
</body>
</html>
