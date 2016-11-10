<?php

namespace App;

use App\BoardJobs\Presenters\JobPresenter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     * Present the job data
     *
     * @return JobPresenter
     */
    public function presenter()
    {
        return new JobPresenter($this);
    }

    /**
     * @param  $query
     * @return mixed
     */
    public function scopeApproved($query)
    {
        return $query->with('user', 'tags')->where('approve', 1);
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
            $search = $filter['search'];

            $query->where(function ($query) use ($search) {
                foreach (explode(" ", $search) as $searchWord) {
                    $query->where('title', 'like', '%' . $searchWord . '%')
                        ->orWhere('description', 'like', '%' . $searchWord . '%');
                }
            });
        }

        if (isset($filter['order'])) {
            $order = ($filter['order'] == 'oldest') ? 'asc' : 'desc';

            $query->orderBy('created_at', $order);
        }

        if (!empty($filter['from']) && !empty($filter['to'])) {
            $from = Carbon::parse($filter['from'])->toDateString();
            $to = Carbon::parse($filter['to'])->toDateString();

            $query->where(function ($query) use ($from, $to) {
                $query->whereBetween('created_at', [$from, $to]);
            });
        }

        if (isset($filter['tags'])) {
            $tags = $filter['tags'];

            $query->whereHas('tags', function ($query) use ($tags) {
                $query->whereIn('tag_id', $tags);
            });
        }

        return $query;
    }

}
