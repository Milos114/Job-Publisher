<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'Simple User'
        ]);

        Role::create([
            'name' => 'owner',
            'display_name' => 'Owner',
            'description' => 'Site Owner'
        ]);

        Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator of the site',
            'description' => 'Extra ordinary admin'
        ]);
    }
}
