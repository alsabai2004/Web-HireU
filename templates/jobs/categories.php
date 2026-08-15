<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories - Web-HireU</title>
</head>
<body>

<?php require dirname(__DIR__) . '/partials/nav.php'; ?>

<h1>Job Categories</h1>

<?php foreach ($categories as $category): ?>

<p>
    <a href="/search?q=<?= urlencode($category['name']) ?>">
        <?= htmlspecialchars($category['name']) ?>
    </a>
</p>

<?php endforeach; ?>

</body>
</html>
