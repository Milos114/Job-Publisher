<?php

namespace App;

use App\BoardJobs\Presenters\UserPresenter;
use Illuminate\Support\Facades\Auth;
use Zizaco\Entrust\Traits\EntrustUserTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use EntrustUserTrait;
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
     * Present the user data
     *
     * @return UserPresenter
     */
    public function presenter()
    {
        return new UserPresenter($this);
    }

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
        return $this->jobs()->where('approve', 0)->exists();
    }

    /**
     * Log in existing or create new user
     *
     * @return mixed
     */
    public function process() : User
    {
        if ($this->id) {
            return $this;
        }

        return static::create([
            'email' => $this->email,
            'name' => $this->name
        ]);
    }

}
