<?php

namespace App\Listeners;

use App\Events\SubmissionStatusChanged;
use Illuminate\Support\Facades\Log;

class LogSubmissionStatus
{
      public function handle($event): void
{
    Log::info('🔥 EVENT FIRED: Submission status changed', [
        'submission_id' => $event->submission->id,
        'status' => $event->status,
    ]);
}
    
}


