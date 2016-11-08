<?php

use App\Job;
use Illuminate\Database\Seeder;

class JobTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Job::all() as $job) {
            $job->tags()->attach(mt_rand(1, 6));
        }
    }
}
