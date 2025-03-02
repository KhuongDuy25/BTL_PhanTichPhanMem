<?php

namespace App\Http\Controllers;

use App\Models\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    //
    public function create()
    {
        return view('admin.jobType.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);
        JobType::create($request->all());
        return redirect()->route('admin.jobType.manage')->with('success', 'JobType created successfully');
    }
    public function manage()
    {
        $jobTypes = JobType::oldest()->paginate(3);
        return view('admin.jobType.manage', ['jobTypes' => $jobTypes]);
    }
}