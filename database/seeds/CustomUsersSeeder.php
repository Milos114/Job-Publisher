<?php

use App\User;
use Illuminate\Database\Seeder;

class CustomUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt(111111),
        ]);
        $admin->roles()->attach(3);

        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt(111111),
        ]);
        $user->roles()->attach(1);
    }
}
