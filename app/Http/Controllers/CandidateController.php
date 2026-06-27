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
        //
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
        if ($request->hasFile('resume')) {
            $path = $request->file('resume')->store('resume');

            $validate ['user_id'] = auth()->user()->id;
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
    public function edit(resources $resources)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, resources $resources)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(resources $resources)
    {
        //
    }
}
