<?php

namespace App\Http\Controllers;

use App\Models\Employer;
use App\Models\User;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employers = Employer::where('user_id', auth()->user()->id)->first();
        if (!$employers) {
            return redirect()->route('employer.create')
                ->with('error', 'Profile not found. Please create one.');
        }
        return view('employer.index', compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if ($employers = Employer::where('user_id',auth()->user()->id)->first()) {
           return redirect()->route('employer.edit',['employer'=> $employers->id]);
        }
        return view('employer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'company_name' => 'required',
            'city' => 'required',
            'description' => 'required',
        ]);
        $validate ['user_id'] = auth()->user()->id;
        Employer::create($validate);

        return redirect('/employer');
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
    public function edit(Employer $employer)
    {
        if ($employer->user_id !== auth()->id()) {
            abort(403);
        }

        return view('employer.edit', compact('employer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employer $employer)
    {
        $validate = $request->validate([
            'company_name' => 'required',
            'city' => 'required',
            'description' => 'required',
        ]);

        $employer->update($validate);

        return redirect()
            ->route('employer.index')
            ->with('success', 'Employer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
