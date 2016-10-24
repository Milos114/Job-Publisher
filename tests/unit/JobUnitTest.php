<?php

use App\Job;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JobUnitTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_has_exact_number_of_approved_jobs()
    {
        $user = factory(User::class)->create();
        factory(Job::class, 10)->create(['user_id' => $user->id]);

        $jobsApproved = Job::approved()->get();

        $this->assertEquals(10, $jobsApproved->count());
    }
}
