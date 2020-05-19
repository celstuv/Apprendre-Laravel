<?php

namespace App\Listeners;

use App\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeUserMail;

//cette class envoie le mail de confirmation de la création d'un nouveau utilisateur
//ShouldQueue réduit la latence sur le site
class UserHasRegisteredListener implements ShouldQueue
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
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
      sleep(5);
      //on récupère les informations du user depuis l'évènement
        Mail::to($event->user->email)->send(new WelcomeUserMail($event->user));
    }
}
