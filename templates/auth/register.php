<!DOCTYPE html>
<html lang="en">
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1">
<title>Register - Web-HireU</title></head>
<body>
<?php require __DIR__ . '/../partials/nav.php'; ?>
<h1>Create Account</h1>

<?php if (!empty($error)): ?><p><?= htmlspecialchars($error) ?></p><?php endif; ?>

<form method="post">
<input name="name" placeholder="Full name" required><br>
<input type="email" name="email" placeholder="Email" required><br>
<input type="password" name="password" placeholder="Password" minlength="8" required><br>
<button>Register</button>
</form>

<a href="/login">Already have an account?</a>
</body>
</html>
