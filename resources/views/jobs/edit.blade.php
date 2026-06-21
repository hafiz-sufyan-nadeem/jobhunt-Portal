<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Job: {{ $job->title }}</title>
</head>
<body>

<h2>Edit Job Details</h2>
@if($errors->any())
    @foreach($errors->all() as $error)
        <p>{{ $error }}</p>
    @endforeach
@endif
<form action="{{ route('jobs.update', $job->id) }}" method="POST">
    @csrf
    @method('PATCH')

    <!-- Job Title -->
    <div>
        <label>Job Title:</label>
        <input type="text" name="title" value="{{ $job->title }}" required>
    </div>

    <!-- Job Type -->
    <div>
        <label>Job Type:</label>
        <input type="text" name="type" value="{{ $job->type }}" required>
    </div>

    <!-- City -->
    <div>
        <label>City:</label>
        <input type="text" name="city" value="{{ $job->city }}" required>
    </div>

    <!-- Salary Range -->
    <div>
        <label>Salary Range:</label>
        <input type="text" name="salary_range" value="{{ $job->salary_range }}" required>
    </div>

    <!-- Status -->
    <div>
        <label>Status:</label>
        <input type="text" name="status" value="{{ $job->status }}" required>
    </div>

    <div>
        <label>Deadline:</label>
        <input type="date" name="deadline" value="{{ $job->deadline }}" required>
    </div>

    <!-- Update Button -->
    <div>
        <button type="submit">Update Job</button>
    </div>

</form>

</body>
</html>
