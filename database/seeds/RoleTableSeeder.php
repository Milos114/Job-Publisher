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
            'display_name' => 'custom user',
            'description' => 'Just an ordinary everyday user'
        ]);

        Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator of the site',
            'description' => 'Extra ordinary admin'
        ]);
    }
}
