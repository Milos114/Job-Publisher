<?php

namespace App\BoardJobs;


use Illuminate\Support\Facades\Mail;

class Mailer
{
    /**
     * @param $view
     * @param $user
     * @param string $moderator
     */
    public function sendMail($view, $user, $moderator = '')
    {
        Mail::send($view, ['user' => $user, 'moderator' => $moderator], function ($m) use ($user, $moderator) {
            $m->from('hello@board.com', 'Board Project');

            if ($moderator) {
                $m->to($moderator, 'Moderator Name')->subject('Job Posting Email!');
            }
            $m->to($user->email, $user->name)->subject('Your First Job Posting!');
        });
    }
}