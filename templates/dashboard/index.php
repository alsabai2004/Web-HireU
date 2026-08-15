<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Dashboard - Web-HireU</title>
<link rel="stylesheet" href="/css/web-hireu.css">
</head>
<body>

<?php require __DIR__ . '/../partials/nav.php'; ?>

<main>
    <div class="hero">
        <h1>Welcome, <?= htmlspecialchars($user['name']) ?></h1>
        <p><?= htmlspecialchars($user['email']) ?></p>
        <p>Manage your career and job applications from your dashboard.</p>
    </div>

    <div class="grid">
        <article class="dashboard-card">
            <h2>Browse Jobs</h2>
            <p>Explore available career opportunities.</p>
            <a class="btn" href="/jobs">Browse Jobs</a>
        </article>

        <article class="dashboard-card">
            <h2>My Applications</h2>
            <p>Track jobs you have applied for.</p>
            <a class="btn" href="/applications">My Applications</a>
        </article>

        <article class="dashboard-card">
            <h2>Employer</h2>
            <p>Manage jobs and applicants.</p>
            <a class="btn" href="/employer">Employer Dashboard</a>
        </article>

        <article class="dashboard-card">
            <h2>Post a Job</h2>
            <p>Create a new job opportunity.</p>
            <a class="btn" href="/create-job">Post a Job</a>
        </article>
    </div>

    <div class="actions">
        <a class="btn" href="/applicants">Applicants</a>
        <a class="btn" href="/logout">Logout</a>
    </div>
</main>

</body>
</html>
