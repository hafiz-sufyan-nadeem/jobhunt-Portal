<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
</head>
<body>
<div>
    <nav>
        @auth
            <!-- Agar user logged in hai -->
            <a href="/logout">Logout</a>
        @else
            <!-- Agar user logged in nahi hai -->
            <a href="/login">Login</a>
            <a href="/register">Register</a>
        @endauth

    </nav>
</div>

<div class="container">
@foreach($jobs as $job)
        <div>
            <h3>{{ $job->title }}</h3>
            <p>{{ $job->city }}</p>
            <p>{{ $job->type }}</p>
            <p>{{ $job->salary_range }}</p>
        </div>
@endforeach
</div>
</body>
</html>
