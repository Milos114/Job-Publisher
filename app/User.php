<?php

namespace App;

use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\BoardJobs\Traits\UserPresenterTrait;

class User extends Authenticatable
{
    use EntrustUserTrait, UserPresenterTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * User can have many jobs
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Check for pending approvals
     *
     * @return mixed
     */
    public function jobPending()
    {
        return $this->jobs()->where('approve', 0)->first() ? true : false;
    }

}
