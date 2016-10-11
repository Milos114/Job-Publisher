<?php
/**
 * Created by PhpStorm.
 * User: misel
 * Date: 10/11/16
 * Time: 11:01 PM
 */

namespace App\BoardJobs;


use Illuminate\Support\Facades\Mail;

class Mailer
{
    /**
     * @param $user
     * @param $view
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