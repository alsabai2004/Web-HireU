<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Search Jobs - Web-HireU</title>
<link rel="stylesheet" href="/css/web-hireu.css">
</head>
<body>

<?php require dirname(__DIR__) . '/partials/nav.php'; ?>

<main>
    <div class="hero">
        <h1>Find Your Next Opportunity</h1>
        <p>Search jobs by title, company, keyword or location.</p>

        <form method="GET" action="/search">
            <?= \WebHireU\Core\Csrf::field() ?>

            <input name="q"
                   value="<?= htmlspecialchars($query) ?>"
                   placeholder="Job title, company or keyword">

            <input name="location"
                   value="<?= htmlspecialchars($location) ?>"
                   placeholder="Location">

            <button type="submit">Search Jobs</button>
        </form>
    </div>

    <section>
        <h2>Search Results</h2>

        <?php if (!$jobs): ?>

            <div class="card">
                <h3>No jobs found</h3>
                <p>Try different keywords or another location.</p>
            </div>

        <?php else: ?>

            <div class="jobs">
                <?php foreach ($jobs as $job): ?>
                    <article class="job-card">
                        <span class="badge">
                            <?= htmlspecialchars($job['category'] ?? 'General') ?>
                        </span>

                        <h2><?= htmlspecialchars($job['title']) ?></h2>

                        <p>
                            <strong><?= htmlspecialchars($job['company']) ?></strong>
                            · <?= htmlspecialchars($job['location']) ?>
                        </p>

                        <p>
                            <?= htmlspecialchars(mb_strimwidth($job['description'], 0, 180, '...')) ?>
                        </p>

                        <a class="btn"
                           href="/job?id=<?= (int)$job['id'] ?>">
                            View Job
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>
    </section>
</main>

</body>
</html>
