<?php

namespace App\Http\Controllers;

use App\BoardJobs\FirstTimePoster;
use App\BoardJobs\RegularPoster;

use App\Http\Requests;
use App\Job;
use App\Tag;
use Illuminate\Http\Request;

class JobController extends Controller
{
    protected $tag;

    /**
     * JobController constructor.
     * @param Tag $tag
     */
    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
        $this->middleware('auth');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $this->validate($request, [
           'from' => 'date',
           'to' => 'date',
        ]);

        $tags = $this->tag->get(['id', 'name']);

        $jobs = Job::approved()
            ->filter($request->except('_token'))
            ->paginate($request->get('paginate'));

        return view('jobs.index', compact('jobs', 'tags'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $tags = $this->tag->get(['id', 'name']);

        return view('jobs.create', compact('tags'));
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
