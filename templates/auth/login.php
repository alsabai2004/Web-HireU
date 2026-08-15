<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Login - Web-HireU</title>
</head>
<body>
<?php require __DIR__ . '/../partials/nav.php'; ?>
<h1>Web-HireU</h1>
<h2>Login</h2>
<?php if (!empty($error)): ?><p><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="post">
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Login</button>
</form>
<a href="/register">Create account</a>
</body>
</html>
