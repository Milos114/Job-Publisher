<?php

use App\Role;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(RoleTableSeeder::class);
         $this->call(PermissionTableSeeder::class);

        foreach (User::all() as $user) {
            $user->roles()->attach(mt_rand(1, 2));
        }

        foreach (Role::all() as $role) {
            $role->perms()->attach(mt_rand(1, 2));
        }
    }
}
