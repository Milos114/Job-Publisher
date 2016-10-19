<?php

namespace App\BoardJobs\Presenters;


use App\User;

class UserPresenter
{
    protected $user;

    /**
     * UserPresenter constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function fullName()
    {
        return $this->user->name . " : " . $this->user->email;
    }
}