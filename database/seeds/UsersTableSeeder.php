<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 9)->create()->each(function ($u) {
            $u->jobs()->saveMany(factory(App\Job::class, 4)->make());
        });
    }
}
