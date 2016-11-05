<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Job extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'email',
        'approve'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @param  $query
     * @return mixed
     */
    public function scopeApproved($query)
    {
        return $query->with(['user' => function ($user) {
            $user->addSelect(['name', 'id']);
        }])->where('approve', 1)
            ->addSelect('title', 'created_at', 'user_id');
    }

    /**
     * Query builder
     *
     * @param  $query
     * @param  $filter
     * @return mixed
     */
    public function scopeFilter($query, $filter)
    {
        if (isset($filter['search'])) {
            foreach (explode(" ", $filter['search']) as $searchWord) {
                $query->where('title', 'like', '%' . $searchWord . '%')
                    ->orWhere('description', 'like', '%' . $searchWord . '%');
            }
        }

        if (isset($filter['order'])) {
            $order = ($filter['order'] == 'oldest') ? 'asc' : 'desc';
            $query->orderBy('created_at', $order);
        }

        return $query;
    }
}
