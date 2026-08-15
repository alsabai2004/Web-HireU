<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Categories - Web-HireU</title>
<link rel="stylesheet" href="/css/web-hireu.css">
</head>
<body>

<?php require __DIR__ . '/../partials/nav.php'; ?>

<main class="categories-page">
    <div class="hero">
        <h1>Job Categories</h1>
        <p>Explore opportunities by professional category.</p>
    </div>

    <div class="categories-grid">
        <?php foreach (($categories ?? []) as $category): ?>
            <a class="category-card"
               href="/jobs?q=<?= urlencode($category['name']) ?>">
                <h3><?= htmlspecialchars($category['name']) ?></h3>
                <p>Browse jobs in this category</p>
            </a>
        <?php endforeach; ?>
    </div>

    <div class="actions">
        <a class="btn" href="/jobs">Browse All Jobs</a>
    </div>
</main>

</body>
</html>
