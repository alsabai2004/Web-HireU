<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Login - Web-HireU</title>
<link rel="stylesheet" href="/css/web-hireu.css">
</head>
<body>

<?php require __DIR__ . '/../partials/nav.php'; ?>

<main>
    <div class="hero">
        <h1>Welcome Back</h1>
        <p>Sign in to your Web-HireU account.</p>
    </div>

    <?php if (!empty($error)): ?>
        <div class="alert"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="post">
        <h2>Sign In</h2>

        <label>Email</label>
        <input type="email" name="email"
               placeholder="you@example.com" required>

        <label>Password</label>
        <input type="password" name="password"
               placeholder="Your password" required>

        <button type="submit">Login</button>

        <div class="actions">
            <a href="/register">Create a new account</a>
        </div>
    </form>
</main>

</body>
</html>
