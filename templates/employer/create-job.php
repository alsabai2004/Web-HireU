<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Post a Job - Web-HireU</title>
<link rel="stylesheet" href="/css/web-hireu.css">
</head>
<body>

<?php require __DIR__ . '/../partials/nav.php'; ?>

<main>
    <div class="hero">
        <h1>Post a New Job</h1>
        <p>Connect with talented people looking for their next opportunity.</p>
    </div>

    <?php if (!empty($errors)): ?>
        <div class="alert">
            <?php foreach ($errors as $error): ?>
                <div><?= htmlspecialchars($error) ?></div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="_csrf"
               value="<?= WebHireU\Core\Security::csrf() ?>">

        <h2>Job Information</h2>

        <label>Job Title</label>
        <input name="title"
               placeholder="e.g. Senior PHP Developer"
               required>

        <label>Company</label>
        <input name="company"
               placeholder="Company name"
               required>

        <label>Location</label>
        <input name="location"
               placeholder="e.g. Remote, Sana'a">

        <label>Category ID</label>
        <input name="category_id"
               type="number"
               placeholder="Category ID">

        <label>Job Description</label>
        <textarea name="description"
                  placeholder="Describe the role, requirements and responsibilities..."
                  required></textarea>

        <div class="actions">
            <button type="submit">Publish Job</button>
            <a class="btn" href="/dashboard">Cancel</a>
        </div>
    </form>
</main>

</body>
</html>
