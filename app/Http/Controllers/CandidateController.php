<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\resources;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidates = Candidate::where('user_id', auth()->user()->id)->first();

        if (!$candidates) {
            return redirect()->route('candidate.create')->with('error', 'Profile not found Please create profile first');
        }
        return view('candidate.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($candidates = Candidate::where('user_id', auth()->user()->id)->first())
        {
            return redirect()->route('candidate.edit', $candidates->id);
        }
        return view('candidate.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = request()->validate([
            'headline' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'skills' => 'required',
            'resume' => 'nullable|mimes:pdf,docx,doc'
        ]);
        $validate ['user_id'] = auth()->user()->id;
        if ($request->hasFile('resume')) {
            $validate['resume'] = $request->file('resume')->store('resumes', 'public');
        }
            Candidate::create($validate);
            return redirect()->route('candidate.index')->with('success', 'Profile created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(resources $resources)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Candidate $candidate)
    {
        if ($candidate->user_id !== auth()->id()){
            abort(403);
        }
        return view('candidate.edit', compact('candidate'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Candidate $candidate)
    {
        $validate = request()->validate([
            'headline' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'skills' => 'required',
            'resume' => 'nullable|mimes:pdf,docx,doc'
        ]);
        if ($request->hasFile('resume')) {
            $validate['resume'] = $request->file('resume')->store('resumes', 'public');
        }
        $candidate->update($validate);
        return redirect()->route('candidate.index')->with('success', 'Profile updated successfully') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(resources $resources)
    {
        //
    }
}
