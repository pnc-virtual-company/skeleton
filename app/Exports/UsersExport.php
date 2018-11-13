<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class UsersExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $users = User::with('roles')->get();
        //We need to display the roles as a list of roles
        //separated by a comma
        $users->map(function($user) {
            $user['user_roles'] = $user->roles->pluck('name')->implode(', ');
            return $user;
        });
        return $users;
    }

    public function headings(): array
    {
        return [
            __('ID'),
            __('Name'),
            __('Email'),
            __('Roles'),
        ];
    }
}
