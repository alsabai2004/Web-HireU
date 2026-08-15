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

<main>
    <div class="hero">
        <h1>Job Categories</h1>
        <p>Explore jobs by category.</p>
    </div>

    <div class="grid">
        <?php foreach (($categories ?? []) as $category): ?>
            <article class="dashboard-card">
                <h2><?= htmlspecialchars($category['name']) ?></h2>
                <a class="btn"
                   href="/jobs?q=<?= urlencode($category['name']) ?>">
                    Browse Jobs
                </a>
            </article>
        <?php endforeach; ?>
    </div>

    <?php if (empty($categories)): ?>
        <div class="card">
            <p>No categories available.</p>
        </div>
    <?php endif; ?>

    <div class="actions">
        <a class="btn" href="/jobs">All Jobs</a>
    </div>
</main>

</body>
</html>
