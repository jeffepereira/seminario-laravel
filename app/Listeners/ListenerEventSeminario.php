<?php

namespace App\Listeners;

use App\Mail\TestMaIL;
use App\Post;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class ListenerEventSeminario
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
        Mail::to('jefferson.pereira.nascimento10@gmail.com')
            ->send(new TestMaIL('João', Post::inRandomOrder()->first()));
    }
}
