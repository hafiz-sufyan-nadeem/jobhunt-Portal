<?php

namespace App\Mail;

use App\Models\Candidate;
use App\Models\JobListing;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Attachment;

class JobApplicationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $job;
    public $candidate;

    public function __construct(JobListing $job, Candidate $candidate)
    {
        $this->job = $job;
        $this->candidate = $candidate;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'New Application — ' . $this->job->title,
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.job-application',
        );
    }

    public function attachments(): array
    {
        if($this->candidate->resume){
            return [
                Attachment::fromStorage($this->candidate->resume)
                    ->as('resume.pdf')
                    ->withMime('application/pdf'),
            ];
        }
        return [];
    }
}
