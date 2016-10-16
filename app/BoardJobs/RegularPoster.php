<?php

namespace App\BoardJobs;


class RegularPoster
{
    /**
     * @param  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle($attributes)
    {
        return auth()->user()->jobs()->create($attributes);
    }
}