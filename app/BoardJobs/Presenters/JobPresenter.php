<?php

namespace App\BoardJobs\Presenters;


use App\Job;
use Carbon\Carbon;

class JobPresenter
{
    protected $job;

    /**
     * JobPresenter constructor.
     * @param Job $job
     */
    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    /**
     * @return string
     */
    public function color()
    {
        if ($this->job->created_at->addWeeks(1) < Carbon::now()) {
            return 'red';
        }

        return 'green';
    }
}