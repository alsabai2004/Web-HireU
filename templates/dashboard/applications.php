<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>My Applications - Web-HireU</title>
<link rel="stylesheet" href="/css/web-hireu.css">
</head>
<body>

<?php require __DIR__ . '/../partials/nav.php'; ?>

<main>
    <div class="hero">
        <h1>My Applications</h1>
        <p>Track the jobs you have applied for.</p>
    </div>

    <?php if (empty($applications)): ?>

        <div class="card">
            <h2>No Applications Yet</h2>
            <p>You have not applied for any jobs yet.</p>
            <a class="btn" href="/jobs">Browse Jobs</a>
        </div>

    <?php else: ?>

        <div class="jobs">
            <?php foreach (($applications ?? []) as $application): ?>
                <article class="job-card">
                    <span class="badge">Application</span>

                    <h2><?= htmlspecialchars($application['title']) ?></h2>

                    <p>
                        <strong><?= htmlspecialchars($application['company']) ?></strong>
                    </p>

                    <p>
                        Applied:
                        <?= htmlspecialchars($application['created_at']) ?>
                    </p>
                </article>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>

    <div class="actions">
        <a class="btn" href="/jobs">Browse Jobs</a>
        <a class="btn" href="/dashboard">Dashboard</a>
    </div>
</main>

</body>
</html>
