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
        $employee = new User();
        $employee->name = 'John DOE';
        $employee->email = 'employee@example.com';
        $employee->password = bcrypt('password');
        $employee->save();
        $employee->roles()->attach($roleEmployee);

        $employee = new User();
        $employee->name = 'Georges DUPONT';
        $employee->email = 'georges@example.com';
        $employee->password = bcrypt('password');
        $employee->save();
        $employee->roles()->attach($roleEmployee);

        $employee = new User();
        $employee->name = 'Bernard MARTIN';
        $employee->email = 'bernard@example.com';
        $employee->password = bcrypt('password');
        $employee->save();
        $employee->roles()->attach($roleEmployee);

        $employee = new User();
        $employee->name = 'Luke SKYWALKER';
        $employee->email = 'luke@example.com';
        $employee->password = bcrypt('password');
        $employee->save();
        $employee->roles()->attach($roleEmployee);

        $employee = new User();
        $employee->name = 'Dark VADOR';
        $employee->email = 'dark@example.com';
        $employee->password = bcrypt('password');
        $employee->save();
        $employee->roles()->attach($roleEmployee);

        $employee = new User();
        $employee->name = 'Uncle PALPATINE';
        $employee->email = 'emperor@example.com';
        $employee->password = bcrypt('password');
        $employee->save();
        $employee->roles()->attach($roleEmployee);

        $employee = new User();
        $employee->name = 'Uncle TOM';
        $employee->email = 'uncle@example.com';
        $employee->password = bcrypt('password');
        $employee->save();
        $employee->roles()->attach($roleEmployee);

        $employee = new User();
        $employee->name = 'Bob DENARD';
        $employee->email = 'bob@example.com';
        $employee->password = bcrypt('password');
        $employee->save();
        $employee->roles()->attach($roleEmployee);

        $employee = new User();
        $employee->name = 'Leila SKYWALKER';
        $employee->email = 'leila@example.com';
        $employee->password = bcrypt('password');
        $employee->save();
        $employee->roles()->attach($roleEmployee);

        $employee = new User();
        $employee->name = 'Obi WAN KENOBI';
        $employee->email = 'obi@example.com';
        $employee->password = bcrypt('password');
        $employee->save();
        $employee->roles()->attach($roleEmployee);

        $manager = new User();
        $manager->name = 'Benjamin BALET';
        $manager->email = 'manager@example.com';
        $manager->password = bcrypt('manager');
        $manager->save();
        $manager->roles()->attach($roleManager);

        $manager = new User();
        $manager->name = 'Channak CHHON';
        $manager->email = 'channak@example.com';
        $manager->password = bcrypt('manager');
        $manager->save();
        $manager->roles()->attach($roleManager);

        $manager = new User();
        $manager->name = 'Rady Y';
        $manager->email = 'rady@example.com';
        $manager->password = bcrypt('manager');
        $manager->save();
        $manager->roles()->attach($roleManager);

        $manager = new User();
        $manager->name = 'Rith NHEL';
        $manager->email = 'rith@example.com';
        $manager->password = bcrypt('manager');
        $manager->save();
        $manager->roles()->attach($roleManager);
    }
}
