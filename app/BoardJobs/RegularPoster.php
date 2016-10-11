<?php
/**
 * Created by PhpStorm.
 * User: misel
 * Date: 10/11/16
 * Time: 11:59 PM
 */

namespace App\BoardJobs;


use App\User;

class RegularPoster
{
    /**
     * @param  User $user
     * @param  $attributes
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function handle(User $user, $attributes)
    {
        return $user->jobs()->create($attributes);
    }
}