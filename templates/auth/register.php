<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title>Register - Web-HireU</title>
</head>
<body>
<?php require __DIR__ . '/../partials/nav.php'; ?>
<h1>Web-HireU</h1>
<h2>Create Account</h2>
<?php if (!empty($error)): ?><p><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="post">
<input type="text" name="name" placeholder="Name" required>
<input type="email" name="email" placeholder="Email" required>
<input type="password" name="password" placeholder="Password" minlength="6" required>
<button type="submit">Register</button>
</form>
<a href="/login">Already have an account?</a>
</body>
</html>
