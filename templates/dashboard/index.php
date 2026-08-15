<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Dashboard - Web-HireU</title><link rel="stylesheet" href="/css/web-hireu.css"></head>
<body>
<?php require __DIR__ . '/partials/nav.php'; ?>
<h1>Dashboard</h1>
<p>Welcome, <?= htmlspecialchars($user['name']) ?></p>
<p><?= htmlspecialchars($user['email']) ?></p>
<a href="/jobs">Browse Jobs</a> |
<a href="/applications">My Applications</a> |
<a href="/applicants">Applicants</a> |
<a href="/employer">Employer Dashboard</a> |
<a href="/create-job">Post a Job</a> |
<a href="/logout">Logout</a>
</body>
</html>
