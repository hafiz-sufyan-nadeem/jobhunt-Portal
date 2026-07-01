<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
</head>
<body style="font-family: sans-serif; background: #f3f4f6; padding: 20px;">

<div style="max-width: 600px; margin: 0 auto; background: white; border-radius: 8px; padding: 32px;">

    <h2 style="color: #1e293b;">Application Status Update</h2>

    <p style="color: #64748b;">Hi <strong>{{ $application->candidate->user->name }}</strong>,</p>

    @if($application->status == 'shortlisted')
        <div style="background: #fefce8; border-left: 4px solid #eab308; padding: 16px; border-radius: 4px; margin: 20px 0;">
            <p style="color: #854d0e;">🎉 Congratulations! You have been <strong>Shortlisted</strong> for:</p>
            <p><strong>{{ $application->job->title }}</strong> at {{ $application->job->employer->company_name }}</p>
            <p>The employer will contact you soon for next steps.</p>
        </div>

    @elseif($application->status == 'hired')
        <div style="background: #f0fdf4; border-left: 4px solid #22c55e; padding: 16px; border-radius: 4px; margin: 20px 0;">
            <p style="color: #166534;">🎊 Congratulations! You have been <strong>Hired</strong> for:</p>
            <p><strong>{{ $application->job->title }}</strong> at {{ $application->job->employer->company_name }}</p>
            <p>Welcome to the team! The employer will reach out with further details.</p>
        </div>

    @elseif($application->status == 'reviewed')
        <div style="background: #eff6ff; border-left: 4px solid #3b82f6; padding: 16px; border-radius: 4px; margin: 20px 0;">
            <p style="color: #1e40af;">👀 Your application is being <strong>Reviewed</strong> for:</p>
            <p><strong>{{ $application->job->title }}</strong> at {{ $application->job->employer->company_name }}</p>
            <p>Please wait while the employer reviews your profile.</p>
        </div>

    @elseif($application->status == 'rejected')
        <div style="background: #fef2f2; border-left: 4px solid #ef4444; padding: 16px; border-radius: 4px; margin: 20px 0;">
            <p style="color: #991b1b;">We regret to inform you that your application was <strong>Not Selected</strong> for:</p>
            <p><strong>{{ $application->job->title }}</strong> at {{ $application->job->employer->company_name }}</p>
            <p>Don't give up! Keep applying on JobHunt.</p>
        </div>
    @endif

    <a href="{{ route('home') }}" style="display: inline-block; margin-top: 20px; padding: 10px 24px; background: #6366f1; color: white; border-radius: 6px; text-decoration: none;">
        Browse More Jobs
    </a>

    <p style="color: #94a3b8; font-size: 12px; margin-top: 32px;">JobHunt Portal — Pakistan ka #1 Job Portal</p>

</div>

</body>
</html>
