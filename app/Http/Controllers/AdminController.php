<?php

namespace App\Http\Controllers;

use App\Models\Submission;
use Illuminate\Http\Request;
use App\Events\SubmissionStatusChanged;
use App\Notifications\SubmissionStatusNotification;

class AdminController extends Controller
{
    public function index()
    {
        $submissions = Submission::with('user')->latest()->get();
        return view('admin.dashboard', compact('submissions'));
    }

   
public function approve($id)
{
    $submission = Submission::with('user')->findOrFail($id);

    $submission->update([
        'status' => 'approved'
    ]);

    $submission->user->notify(
        new SubmissionStatusNotification($submission, 'approved')
    );

    return back();
}

public function reject($id)
{
    $submission = Submission::with('user')->findOrFail($id);

    $submission->update([
        'status' => 'rejected'
    ]);

    $submission->user->notify(
        new SubmissionStatusNotification($submission, 'rejected')
    );

    return back();
}
}


