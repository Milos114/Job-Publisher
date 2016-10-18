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
        $this->call(UserRoleTableSeeder::class);
        $this->call(RolePermissionTableSeeder::class);

        $this->createAdmin();
    }

    public function createAdmin()
    {
        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt(111111),
        ]);

        $admin->roles()->attach(3);
    }
}
