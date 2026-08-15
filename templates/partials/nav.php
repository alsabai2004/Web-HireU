<nav>
    <strong>Web-HireU</strong>
    &nbsp;&nbsp;

    <a href="/">Home</a>
    <a href="/jobs">Jobs</a>
    <a href="/search">Search</a>
    <a href="/categories">Categories</a>

    <?php if (\WebHireU\Core\Auth::check()): ?>
        <a href="/dashboard">Dashboard</a>
        <a href="/employer">Employer</a>
        <a href="/logout">Logout</a>
    <?php else: ?>
        <a href="/login">Login</a>
        <a href="/register">Register</a>
    <?php endif; ?>
</nav>
