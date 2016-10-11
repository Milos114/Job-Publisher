<?php

namespace App\Http\Controllers;

use App\BoardJobs\FirstTimePoster;
use App\BoardJobs\RegularPoster;

use App\Http\Requests;

class JobController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Requests\JobsCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Requests\JobsCreateRequest $request)
    {
        $user = auth()->user();

        $this->getStrategy()->handle($user, $request->all());

        return back()->with('status', 'Job Post Created!');
    }

    /**
     * @return FirstTimePoster|RegularPoster
     */
    protected function getStrategy()
    {
        if (auth()->user()->jobs()->count() == 0) {
            return new FirstTimePoster();
        }

        return new RegularPoster();
    }

}
