<?php

namespace App\Http\Controllers;

use App\BoardJobs\FirstTimePoster;
use App\BoardJobs\RegularPoster;

use App\Http\Requests;

class JobController extends Controller
{
    /**
     * JobController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
     * @param  Requests\JobsCreateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function store(Requests\JobsCreateRequest $request)
    {
        if (auth()->user()->jobPending()) {
          throw new \Exception('You will have to wait for admin approval regarding your previous submission');
        }

        $this->getStrategy()->handle($request->all());

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
