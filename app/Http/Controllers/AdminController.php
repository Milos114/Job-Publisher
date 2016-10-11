<?php

namespace App\Http\Controllers;

use App\Job;

class AdminController extends Controller
{
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
