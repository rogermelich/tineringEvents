<?php

namespace App\Listeners;

use App\Events\EmailSend;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Log;

class ReportUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  EmailSend  $event
     * @return void
     */
    public function handle(EmailSend $event)
    {
        dump('Email Send Ok');
        Log::info('Email Send Ok');
    }
}
