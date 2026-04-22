<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    public function index()
    {
        $submissions = Submission::where('user_id', Auth::id())->get();
        return view('dashboard', compact('submissions'));
    }

    public function store(Request $request)
    {
        // ✅ Backend validation
        $request->validate([
            'file' => 'required|mimes:jpg,png,pdf|max:2048'
        ]);

        // ✅ File upload
        $file = $request->file('file');
        $path = $file->store('submissions', 'public');

        // ✅ Save in DB
        Submission::create([
            'user_id' => Auth::id(),
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $path,
            'status' => 'pending'
        ]);

        return back()->with('success', 'File submitted successfully');
    }
}