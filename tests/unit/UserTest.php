<?php

use App\Job;
use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function user_has_pending_jobs()
    {
        $user = factory(User::class)->create();
        factory(Job::class)->create([
            'user_id' => $user->id,
            'approve' => 0
        ]);

        $pendingJob = $user->jobPending();

        $this->assertTrue($pendingJob);
    }
}
