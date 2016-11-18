<?php

use App\User;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class JobTest extends TestCase
{
    use DatabaseTransactions;

    /** @test */
    public function it_confirms_job_submission_page_exists()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $response = $this->call('GET', 'job-submission');

        $this->assertEquals(200, $response->status());
    }

    /** @test */
    public function it_confirms_job_submission_page_has_tags_variable()
    {
        $user = factory(User::class)->create();
        $this->actingAs($user);

        $this->call('GET', 'job-submission');

        $this->assertViewHas('tags');
    }

    /** @test */
    public function it_redirects_if_user_is_not_authenticated()
    {
        $this->call('GET', 'job-submission');

        $this->assertRedirectedTo('login');
    }

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
