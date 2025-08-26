<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;

class FlashSuccessMessageOnRegistration
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Registered $event): void
    {
        session()->flash('success', 'Your account has been created successfully! Please log in.');
    }
}