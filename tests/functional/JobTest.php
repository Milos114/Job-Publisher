<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JobTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_submits_given_user_jobs()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $this->setExpectedException('Exception');
        $user->pendingJobs();

        $this->call('POST', '/job-submission', [
            'user_id' => $user->id,
            'title' => 'title some',
            'description' => 'description some',
            'email' => 'sally@example.com'
        ]);

        $this->seeInDatabase('jobs', [
            'user_id' => $user->id,
            'email' => 'sally@example.com',
            'title' => 'title some',
            'description' => 'description some',
            'approve' => 0
        ]);
    }
}
