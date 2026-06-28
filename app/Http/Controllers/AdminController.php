<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\JobListing;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Admin Dashboard //
    public function dashboard()
    {
        $totalUsers = User::count();
        $totalJobs = JobListing::count();
        $totalApplications = Application::count();

        return view('admin.dashboard', compact('totalUsers', 'totalJobs', 'totalApplications'));
    }

//    Jobs listing with approval or rejection
    public function jobs()
    {
        $jobs = JobListing::all();
        return view('admin.jobs', compact('jobs'));
    }

    public function approve(JobListing $job)
    {
        $job->status = 'active';
        $job->save();
        return redirect()->route('admin.jobs');
    }

    public function reject(JobListing $job)
    {
        $job->status = 'closed';
        $job->save();
        return redirect()->route('admin.jobs');
    }

//    Users listing

    public function users()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

}
