<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Candidate;
use App\Models\JobListing;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, JobListing $job)
    {
        $candidates = Candidate::where('user_id',auth()->user()->id)->first();

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

        return redirect()->back()->with('success', 'Application submitted successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
