<?php

namespace App\BoardJobs\Traits;


use App\BoardJobs\Presenters\UserPresenter;

trait UserPresenterTrait
{
    /**
     * Present the user data
     *
     * @return UserPresenter
     */
    public function presenter()
    {
        return new UserPresenter($this);
    }
}