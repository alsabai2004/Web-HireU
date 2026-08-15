<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Jobs - Web-HireU</title>
<link rel="stylesheet" href="/css/web-hireu.css">
</head>
<body>

<?php require __DIR__ . '/../partials/nav.php'; ?>

<main>
    <div class="hero">
        <h1>Find Your Next Job</h1>
        <p>Discover opportunities and build your career with Web-HireU.</p>

        <form method="get">
            <input name="q"
                   placeholder="Search jobs..."
                   value="<?= htmlspecialchars($_GET['q'] ?? '') ?>">
            <button type="submit">Search Jobs</button>
        </form>
    </div>

    <div class="actions">
        <a class="btn" href="/">Home</a>
        <a class="btn" href="/dashboard">Dashboard</a>
    </div>

    <section>
        <h2>Available Jobs</h2>

        <div class="jobs">
            <?php foreach (($jobs ?? []) as $job): ?>
                <article class="job-card">
                    <span class="badge">
                        <?= htmlspecialchars($job['category'] ?? 'General') ?>
                    </span>

                    <h2><?= htmlspecialchars($job['title']) ?></h2>

                    <p>
                        <strong><?= htmlspecialchars($job['company']) ?></strong>
                        <?php if (!empty($job['location'])): ?>
                            · <?= htmlspecialchars($job['location']) ?>
                        <?php endif; ?>
                    </p>

                    <a class="btn"
                       href="/job?id=<?= (int)$job['id'] ?>">
                        View Job
                    </a>
                </article>
            <?php endforeach; ?>
        </div>

        <?php if (empty($jobs)): ?>
            <div class="card">
                <h3>No jobs found</h3>
                <p>Try another search or check back later.</p>
            </div>
        <?php endif; ?>
    </section>
</main>

</body>
</html>
