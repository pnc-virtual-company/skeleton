<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleEmployee = Role::where('name', 'User')->first();
        $roleManager  = Role::where('name', 'Administrator')->first();

        //Create 5 random users having two roles
        factory(App\User::class, 5)->create()->each(function($employee) use ($roleManager, $roleEmployee) {
            $employee->roles()->attach($roleManager);
            $employee->roles()->attach($roleEmployee);
        });

        //Create 10 random admins
        factory(App\User::class, 10)->create()->each(function($employee) use ($roleManager) {
            $employee->roles()->attach($roleManager);
        });

        //Create 100 random users
        factory(App\User::class, 100)->create()->each(function($employee) use ($roleEmployee) {
            $employee->roles()->attach($roleEmployee);
        });

    }
}
