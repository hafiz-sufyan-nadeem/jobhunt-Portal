<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
</head>
<body>
<div class="container">
    HeadLine: {{$candidates->headline }} <br>
    Phone: {{ $candidates->phone }} <br>
    City: {{ $candidates->city }} <br>
    Skills: {{ $candidates->skills }} <br>
    Resume: <a href="{{ asset('storage/' . $candidates->resume) }}">Download Resume</a>
    <br>
    <a href="{{ route('candidate.edit', $candidates->id) }}">Edit</a>
</div>

</body>
</html>
