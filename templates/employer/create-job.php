<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Job - Web-HireU</title>
    <link rel="stylesheet" href="/css/web-hireu.css">
</head>
<body>

<?php require dirname(__DIR__) . '/partials/nav.php'; ?>

<main>
    <h1>Post a New Job</h1>

    <form method="POST" action="/employer/jobs">
        <?= \WebHireU\Core\Csrf::field() ?>

        <input name="title" placeholder="Job title" required>
        <input name="location" placeholder="Location" required>

        <textarea
            name="description"
            placeholder="Job description"
            required
        ></textarea>

        <button type="submit">Publish Job</button>
    </form>
</main>

</body>
</html>
