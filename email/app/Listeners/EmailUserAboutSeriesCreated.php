<?php

namespace App\Listeners;

use App\Events\SeriesCriada;
use App\Models\User;
use App\Mail\SeriesCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

class EmailUserAboutSeriesCreated
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
    public function handle(SeriesCriada $event)
    {
        $userList = User::all();
        foreach ($userList as $index => $user) {
            $email = new SeriesCreated(
                $event->seriesName,
                $event->seriesId,
                $event->seriesSeasonsQty,
                $event->seriesEpisodesPerSeason
            );
            $when = now()->addSeconds($index * 5);
            Mail::to($user)->later($when,$email);
        }
    }
}
