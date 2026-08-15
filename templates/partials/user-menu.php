<link rel="stylesheet" href="/css/web-hireu.css">
<?php if (\WebHireU\Core\Auth::check()): ?>
    <nav>
        <a href="/">Home</a> |
        <a href="/jobs">Jobs</a> |
        <a href="/dashboard">Dashboard</a> |
        <a href="/logout">Logout</a>
    </nav>
<?php endif; ?>
