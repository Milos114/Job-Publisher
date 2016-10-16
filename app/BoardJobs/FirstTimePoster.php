<?php

namespace App\BoardJobs;


class FirstTimePoster
{
    /**
     * @param  $attributes
     */
    public function handle($attributes)
    {
        $mailer = new Mailer();

        auth()->user()->jobs()->create([
            'title' => $attributes['title'],
            'description' => $attributes['description'],
            'email' => $attributes['email'],
            'approve' => false
        ]);

        $mailer->sendMail('emails.firstPosting', auth()->user());
        $mailer->sendMail('emails.moderator', auth()->user(), 'moderator@gmail.com');
    }
}