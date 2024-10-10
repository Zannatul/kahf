<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use App\Mail\ScheduleNotificationMail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use App\Services\ServiceInterfaces\UserServiceInterface;

class SendScheduleEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */

    public function __construct() {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $userService = app(UserServiceInterface::class);

        $users = $userService->getNextDayScheduledUser();
        // Send email to each user
        foreach ($users as $user) {
            Mail::to($user['email'])->send(new ScheduleNotificationMail($user));
        }
    }
}
