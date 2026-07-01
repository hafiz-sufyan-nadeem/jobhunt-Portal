<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: sans-serif; background: #f3f4f6; padding: 20px;">

<div style="max-width: 600px; margin: 0 auto; background: white; border-radius: 8px; padding: 32px;">

    <h2 style="color: #1e293b;">New Job Application Received!</h2>

    <p style="color: #64748b;">Someone applied for your job posting:</p>

    <div style="background: #f8fafc; border-left: 4px solid #6366f1; padding: 16px; border-radius: 4px; margin: 20px 0;">
        <p><strong>Job Title:</strong> {{ $job->title }}</p>
        <p><strong>Candidate Name:</strong> {{ $candidate->user->name }}</p>
        <p><strong>Candidate Email:</strong> {{ $candidate->user->email }}</p>
        <p><strong>City:</strong> {{ $candidate->city }}</p>
        <p><strong>Skills:</strong> {{ $candidate->skills }}</p>

    </div>

    <p style="color: #64748b;">Login to your dashboard to review this application.</p>

    <p style="color: #94a3b8; font-size: 12px; margin-top: 32px;">JobHunt Portal — Pakistan ka #1 Job Portal</p>

</div>

</body>
</html>
