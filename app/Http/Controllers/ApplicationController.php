<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Candidate;
use App\Models\Employer;
use App\Models\JobListing;
use Illuminate\Http\Request;

use App\Mail\JobApplicationMail;
use Illuminate\Support\Facades\Mail;
use App\Mail\ApplicationStatusMail;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidate = auth()->user()->candidate;
        $applications = $candidate->applications;
        return view('application.index', compact('applications'));
    }



//     * Store a newly created resource in storage.
    public function store(Request $request, JobListing $job)
    {
        $candidates = Candidate::where('user_id',auth()->user()->id)->first();

        if(!$candidates){
            return redirect()->route('candidate.create')
                ->with('error', 'Please create your profile first before applying!');
        }
        // Check if the candidate already applied for this job
        $alreadyApplied = Application::where('candidate_id', $candidates->id)
            ->where('job_id', $job->id)
            ->exists();

        if ($alreadyApplied) {
            return back()->with('error', 'You have already applied for this job.');
        }

        // Save the new application if it doesn't exist
        $application = new Application();
        $application->candidate_id = $candidates->id;
        $application->job_id = $job->id;
        $application->save();


        Mail::to($job->employer->user->email)
            ->send(new JobApplicationMail($job, $candidates));

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }

    public function employerIndex()
    {
        $employer = auth()->user()->employer;

        $applications = Application::whereHas('job', function($query) use ($employer){
            $query->where('employer_id', $employer->id);
        })->get();

        return view('employer.applications', compact('applications'));
    }

    public function updateStatus(Request $request, Application $application)
    {
        $request->validate([
            'status' => 'required|in:reviewed,interviewing,hired,rejected',
        ]);
        $application->update([
            'status' => $request->status
        ]);


        Mail::to($application->candidate->user->email)
            ->send(new ApplicationStatusMail($application));

        return back()->with('success', 'Application updated successfully!');
    }
}
