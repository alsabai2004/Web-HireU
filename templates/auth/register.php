<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Create Account - Web-HireU</title>
<link rel="stylesheet" href="/css/web-hireu.css">
</head>
<body>

<?php require __DIR__ . '/../partials/nav.php'; ?>

<main>
    <div class="hero">
        <h1>Create Your Account</h1>
        <p>Join Web-HireU and discover new career opportunities.</p>
    </div>

    <?php if (!empty($error)): ?>
        <div class="alert"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post">
        <h2>Get Started</h2>

        <label>Full Name</label>
        <input name="name"
               placeholder="Your full name"
               required>

        <label>Email</label>
        <input type="email"
               name="email"
               placeholder="you@example.com"
               required>

        <label>Password</label>
        <input type="password"
               name="password"
               placeholder="At least 8 characters"
               minlength="8"
               required>

        <button type="submit">Create Account</button>

        <div class="actions">
            <a href="/login">Already have an account? Sign in</a>
        </div>
    </form>
</main>

</body>
</html>
