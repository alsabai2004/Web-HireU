<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?= htmlspecialchars($job['title']) ?> - Web-HireU</title>
<link rel="stylesheet" href="/css/web-hireu.css">
</head>
<body>

<?php require __DIR__ . '/../partials/nav.php'; ?>

<main>
    <div class="hero">
        <span class="badge">
            <?= htmlspecialchars($job['category'] ?? 'Job Opportunity') ?>
        </span>

        <h1><?= htmlspecialchars($job['title']) ?></h1>

        <p>
            <strong><?= htmlspecialchars($job['company']) ?></strong>
            <?php if (!empty($job['location'])): ?>
                · <?= htmlspecialchars($job['location']) ?>
            <?php endif; ?>
        </p>
    </div>

    <article class="card">
        <h2>Job Description</h2>

        <p><?= nl2br(htmlspecialchars($job['description'])) ?></p>

        <div class="actions">
            <form method="post" action="/apply">
                <input type="hidden" name="_csrf"
                       value="<?= WebHireU\Core\Security::csrf() ?>">
                <input type="hidden" name="job_id"
                       value="<?= (int)$job['id'] ?>">

                <button type="submit">Apply for this Job</button>
            </form>

            <a class="btn" href="/jobs">Back to Jobs</a>
        </div>
    </article>
</main>

</body>
</html>
