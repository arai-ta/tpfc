<?php

namespace App\Listeners;

use App\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Mail\Mailer;

class RegisteredEventListener
{

    private $mailer;

    private $eloquent;

    /**
     * Create the event listener.
     *
     * @param Mailer $mailer
     * @param User $eloquent
     */
    public function __construct(Mailer $mailer, User $eloquent)
    {
        $this->mailer   = $mailer;
        $this->eloquent = $eloquent;
    }

    /**
     * Handle the event.
     *
     * @param Registered $event
     * @return void
     */
    public function handle(Registered $event)
    {
        $user = $this->eloquent->findOrFail($event->user->getAuthIdentifier());

        $this->mailer->raw('Sign up completed!', function($message) use($user) {
            $message->subject('THANK YOU FOR SIGN UP')->to($user->email);
        });
    }
}
