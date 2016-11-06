<?php
/**
 * Created by PhpStorm.
 * User: misel
 * Date: 11/6/16
 * Time: 7:07 PM
 */

namespace App\BoardJobs\Presenters;


use App\Job;
use Carbon\Carbon;

class JobPresenter
{
    protected $job;

    public function __construct(Job $job)
    {
        $this->job = $job;
    }

    public function color()
    {
        if ($this->job->created_at->addWeeks(1) < Carbon::now()) {
            return 'red';
        }

        return 'green';
    }
}