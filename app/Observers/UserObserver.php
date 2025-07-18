<?php

namespace App\Observers;

use App\Jobs\SendEmailJob;
use App\Mail\MyEmail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;


class UserObserver
{
    public function creating(User $user) 
    {
        $user->referel_code = Str::random(5);
    }

    /**
     * Handle the User "created" event.
     */
    public function created(User $user): void
    {
        // Send Mail using
    $details['email'] = 'vrajesh.logistic@gmail.com';

  

    dispatch(new SendEmailJob($details));


    }

    /**
     * Handle the User "updated" event.
     */
    public function updated(User $user): void
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     */
    public function deleted(User $user): void
    {
        //
    }

    /**
     * Handle the User "restored" event.
     */
    public function restored(User $user): void
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     */
    public function forceDeleted(User $user): void
    {
        //
    }
}
