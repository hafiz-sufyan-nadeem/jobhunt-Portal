<?php

namespace App\Http\Controllers;

use App\Models\JobCategory;
use App\Models\JobListing;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index()
    {
        $employer = auth()->user()->employer;
        if(!$employer){
            return redirect()->route('employer.create')
                ->with('error', 'Please complete your company profile first.');
        }

        $jobs = JobListing::where('employer_id', $employer->id)->get();
        return view('jobs.index', compact('jobs'));
    }

    public function create()
    {
        $categories = JobCategory::all();
        return view('jobs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'category_id' => 'required',
            'city' => 'required',
            'salary_range' => 'required',
            'deadline' => 'required',
        ]);

        $employer = auth()->user()->employer;

        if(!$employer){
            return redirect()->route('employer.create')
                ->with('error', 'Make company profile first!');
        }
        $validate ['employer_id'] = $employer->id;
        JobListing::create($validate);

        return redirect()->route('jobs.index')
            ->with('success', 'Job posted successfully!');
    }

    public function edit(JobListing $job)
    {
        if ($job->employer_id !== auth()->user()->employer->id) {
            abort(403);
    }
        $categories = JobCategory::all();
        return view('jobs.edit', compact('job', 'categories'));
    }

    public function update(Request $request, JobListing $job)
    {
        $validate = $request->validate([
            'title' => 'required',
            'type' => 'required',
            'city' => 'required',
            'salary_range' => 'required',
            'status' => 'required',
            'deadline' => 'required',
        ]);
        $job->update($validate);
        return redirect()->route('jobs.index')->with('success', 'Job updated successfully!');
    }

    public function destroy(JobListing $job)
    {
        if ($job->employer_id !== auth()->user()->employer->id) {
            abort(403);
        }
        $job->delete();
        return redirect()->route('jobs.index')->with('success', 'Job Deleted successfully!');
    }
}
