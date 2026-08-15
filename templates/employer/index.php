<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Employer Dashboard - Web-HireU</title>
<link rel="stylesheet" href="/css/web-hireu.css">
</head>
<body>

<?php require __DIR__ . '/../partials/nav.php'; ?>

<main>
    <div class="hero">
        <h1>Employer Dashboard</h1>
        <p>Manage your job postings and applicants.</p>

        <div class="actions">
            <a class="btn" href="/create-job">+ Post New Job</a>
            <a class="btn" href="/applicants">View Applicants</a>
        </div>
    </div>

    <section>
        <h2>Your Job Postings</h2>

        <?php if (empty($jobs)): ?>

            <div class="card">
                <h3>No Jobs Posted</h3>
                <p>You haven't posted any jobs yet.</p>
                <a class="btn" href="/create-job">Post Your First Job</a>
            </div>

        <?php else: ?>

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

                        <div class="actions">
                            <a class="btn"
                               href="/job?id=<?= (int)$job['id'] ?>">
                                View Job
                            </a>

                            <form method="post"
                                  action="/employer/delete">
                                <input type="hidden"
                                       name="id"
                                       value="<?= (int)$job['id'] ?>">
                                <button type="submit">Delete</button>
                            </form>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>

        <?php endif; ?>
    </section>
</main>

</body>
</html>
