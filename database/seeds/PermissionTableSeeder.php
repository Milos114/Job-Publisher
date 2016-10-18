<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'name' => 'edit_user',
            'display_name' => 'Edit user',
            'description' => 'Can edit custom user'
        ]);

        Permission::create([
            'name' => 'create_jobs',
            'display_name' => 'Create jobs',
            'description' => 'Can create jobs'
        ]);
    }
}
