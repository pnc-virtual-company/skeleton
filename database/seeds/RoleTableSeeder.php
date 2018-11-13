<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = new Role();
        $role_employee->name = 'User';
        $role_employee->description = 'Regular User';
        $role_employee->save();

        $role_manager = new Role();
        $role_manager->name = 'Administrator';
        $role_manager->description = 'Administrator of the system';
        $role_manager->save();
    }
}
