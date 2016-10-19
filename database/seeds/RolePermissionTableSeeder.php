<?php

use App\Role;
use Illuminate\Database\Seeder;

class RolePermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::where('name', 'owner')->first()->perms()->attach([1, 2]);
        Role::where('name', 'admin')->first()->perms()->attach(2);
    }
}
