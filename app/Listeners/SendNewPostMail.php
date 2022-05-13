<?php

namespace App\Listeners;

use App\Events\NewPost;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Mail\NewPost as NewPostEmail;
use Illuminate\Support\Facades\Mail;

class SendNewPostMail implements ShouldQueue
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
     * @param  \App\Events\NewPost  $event
     * @return void
     */
    public function handle(NewPost $event)
    {
        $post = $event->post;
        $subscribers = $post->website->subscribedUsers;
        foreach ($subscribers as $recipient) {
            if ($recipient->sentPosts->contains($post)) {
                continue;
            }
            Mail::to($recipient->email)->send(new NewPostEmail($post));
            $recipient->sentPosts()->save($post);
        }
    }
}
