<?php

namespace App\Mail;

use App\Models\Application;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ApplicationStatusMail extends Mailable
{
    use Queueable, SerializesModels;

    public $application;

    public function __construct(Application $application)
    {
        $this->application = $application;
    }

    public function envelope(): Envelope
    {
        $subject = match($this->application->status) {
            'shortlisted' => 'Congratulations! You have been Shortlisted — ' . $this->application->job->title,
            'hired'       => 'Congratulations! You have been Hired — ' . $this->application->job->title,
            'rejected'    => 'Application Update — ' . $this->application->job->title,
            'reviewed'    => 'Your Application is being Reviewed — ' . $this->application->job->title,
            default       => 'Application Status Update',
        };

        return new Envelope(subject: $subject);
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.application-status',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
