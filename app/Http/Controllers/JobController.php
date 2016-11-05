<?php

namespace App\Http\Controllers;

use App\BoardJobs\FirstTimePoster;
use App\BoardJobs\RegularPoster;

use App\Http\Requests;
use App\Job;
use Illuminate\Http\Request;

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
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $jobs = Job::approved()
            ->filter($request->except('_token'))
            ->paginate($request->get('paginate'));

        return view('jobs.index', compact('jobs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
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
