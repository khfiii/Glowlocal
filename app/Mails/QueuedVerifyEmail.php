<?php

namespace App\Mails;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class QueuedVerifyEmail extends VerifyEmail implements ShouldQueue {
    use Queueable;
}