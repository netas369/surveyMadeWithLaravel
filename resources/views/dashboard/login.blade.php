<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="/css/styling.css">
    <link rel="stylesheet" type="text/css" href="/css/stylingsurvey.css">
    <link rel="stylesheet" type="text/css" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/WelcomePage.css">
    <title>Login to dashboard</title>
</head>
<header>
    <h1>VVW Schelde Flushing</h1>
    <h1>Control Dashboard</h1>
    <nav class="topnav">
        <ul>
            <li><a class="{{ Request::path() === '/' ? 'active' : '' }}" href="{{ url('/') }}">Home</a></li>
            <li><a class="{{ Request::path() === 'survey' ? 'active' : '' }}" href="{{ url('/survey') }}">Survey</a></li>
            @guest
                <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('/login') }}">Login</a></li>
            @endguest
            @auth
                <li><a class="{{ Request::path() === 'dashboard' ? 'active' : '' }}" href="{{ url('/dashboard') }}">Dashboard</a></li>
            @endauth
        </ul>
    </nav>
</header>
<body>
<h1>Login to see dashboard</h1>
<form>
    <label>Username</label>
    <input type="text"><br><br>
    <label>Password</label>
    <input type="password">
</form>
<button onclick="window.location.href='/dashboard'">Login</button>
</body>
</html>
