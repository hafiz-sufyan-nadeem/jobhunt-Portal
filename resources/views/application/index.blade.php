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
    @foreach($applications as $application)
        <div>
            <h3>{{ $application->job->title }}</h3>
            <p>{{ $application->job->employer->company_name }}</p>
            <p>{{ $application->status }}</p>
            <p>{{ $application->created_at }}</p>
        </div>
@endforeach
</body>
</html>
