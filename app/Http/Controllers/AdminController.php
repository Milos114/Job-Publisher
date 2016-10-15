<?php

namespace App\Http\Controllers;

use App\Job;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('layouts.admin.index');
    }

    /**
     * @param  int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function approve($id)
    {
        Job::findOrFail($id)->update(['approve' => 1]);

        return redirect('/')->with('status', 'Job post approved');
    }
}
