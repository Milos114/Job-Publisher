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
        $job = auth()->user()->jobs()->create($attributes);

        $job->tags()->attach($attributes['tags']);
    }
}