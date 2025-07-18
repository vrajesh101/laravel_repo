<?php

namespace App\Jobs;

use App\Mail\MyEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Mail;

class SendEmailJob implements ShouldQueue
{
    use Queueable;
   protected $data;
    /**
     * Create a new job instance.
     */
    public function __construct($data)
    {
        //
        $this->data=$data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //

         Mail::to($this->data["email"])->send(new MyEmail());

    }
}
