<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;

class JobController extends Controller
{
    // Show the job listing page
    public function index()
    {
        return view('jobs.index');
    }

    // Store a new job
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
            'salary' => 'required|numeric',
        ]);

        // Create a new job record in the database
        $job = Job::create([
            'title' => $request->input('title'),
            'company' => $request->input('company'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
            'salary' => $request->input('salary'),
        ]);

        return response()->json($job);
    }

    // Get jobs for DataTable
    public function getJobs()
    {
        $jobs = Job::all();
        return response()->json(['data' => $jobs]);
    }
}

