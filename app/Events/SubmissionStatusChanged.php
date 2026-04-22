<?php

namespace App\Events;

use App\Models\Submission;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class SubmissionStatusChanged
{
    use Dispatchable, SerializesModels;

    public $submission;
    public $status;

    public function __construct(Submission $submission, $status)
    {
        $this->submission = $submission;
        $this->status = $status;
    }
}