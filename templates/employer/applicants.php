<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Applicants - Web-HireU</title>
<link rel="stylesheet" href="/css/web-hireu.css">
</head>
<body>

<?php require __DIR__ . '/../partials/nav.php'; ?>

<main>
    <div class="hero">
        <h1>Applicants</h1>
        <p>Review and manage applications for your job postings.</p>
    </div>

    <?php if (empty($applications)): ?>

        <div class="card">
            <h2>No Applicants Yet</h2>
            <p>Applications will appear here when candidates apply.</p>
        </div>

    <?php else: ?>

        <div class="jobs">
            <?php foreach (($applications ?? []) as $application): ?>
                <article class="job-card">
                    <span class="badge">
                        <?= htmlspecialchars($application['status']) ?>
                    </span>

                    <h2><?= htmlspecialchars($application['title']) ?></h2>

                    <p>
                        <strong><?= htmlspecialchars($application['name']) ?></strong>
                    </p>

                    <p><?= htmlspecialchars($application['email']) ?></p>

                    <form method="post" action="/application/status">
                        <input type="hidden"
                               name="id"
                               value="<?= (int)$application['id'] ?>">

                        <label>Application Status</label>

                        <select name="status">
                            <option value="pending">Pending</option>
                            <option value="accepted">Accepted</option>
                            <option value="rejected">Rejected</option>
                        </select>

                        <button type="submit">Update Status</button>
                    </form>
                </article>
            <?php endforeach; ?>
        </div>

    <?php endif; ?>
</main>

</body>
</html>
