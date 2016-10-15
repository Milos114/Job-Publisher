<?php

namespace App\BoardJobs;


use App\User;

class FirstTimePoster
{
    /**
     * @param  User $user
     * @param  $attributes
     */
    public function handle(User $user, $attributes)
    {
        $mailer = new Mailer();

        $user->jobs()->create([
            'title' => $attributes['title'],
            'description' => $attributes['description'],
            'email' => $attributes['email'],
            'approve' => false
        ]);

        $mailer->sendMail('emails.firstPosting', $user);
        $mailer->sendMail('emails.moderator', $user, 'moderator@gmail.com');
    }
}