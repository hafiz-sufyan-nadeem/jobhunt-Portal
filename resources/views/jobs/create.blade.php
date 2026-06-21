<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create</title>
</head>
<body>
<div class="form-container">
    <h2>Post a Job</h2>
    <form action="{{route('jobs.store')}}" method="POST">
        @csrf
        <!-- Title -->
        <div class="form-group">
            <label for="title">Job Title</label>
            <input type="text" id="title" name="title" placeholder="e.g., Senior Frontend Developer" required>
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Job Description</label>
            <textarea id="description" name="description" placeholder="Enter job duties and requirements..." required></textarea>
        </div>

        <!-- Type (Dropdown) -->
        <div class="form-group">
            <label for="type">Job Type</label>
            <select id="type" name="type" required>
                <option value="" disabled selected>Select job type</option>
                <option value="full-time">Full-time</option>
                <option value="part-time">Part-time</option>
                <option value="remote">Remote</option>
            </select>
        </div>

        <!-- Category (Dropdown) -->
        <div class="form-group">
            <label for="category">Category</label>
            <select id="category" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- City -->
        <div class="form-group">
            <label for="city">City</label>
            <input type="text" id="city" name="city" placeholder="e.g., Lahore" required>
        </div>

        <!-- Salary Range -->
        <div class="form-group">
            <label for="salary_range">Salary Range</label>
            <input type="text" id="salary_range" name="salary_range" placeholder="e.g., 80,000k - 100,000k" required>
        </div>

        <!-- Deadline -->
        <div class="form-group">
            <label for="deadline">Application Deadline</label>
            <input type="date" id="deadline" name="deadline" required>
        </div>

        <!-- Submit Button -->
        <button type="submit">Publish Job</button>

    </form>
</div>
</body>
</html>
