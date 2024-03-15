<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view companies',
            'edit companies',

            'create jobs',
            'view jobs',
            'edit jobs',
            'delete jobs',

            'view job categories',
            'create job categories',
            'edit job categories',
            'delete job categories',

            'view employee',
            'edit employee',
            'create employee',
            'delete employee',

            'view blogs',
            'create blogs',
            'edit blogs',
            'delete blogs',

            'view blog categories',
            'create blog categories',
            'edit blog categories',
            'delete blog categories',

            'view pages',
            'edit pages',

            'view job application',
            'edit job application',

            'view users',
            'edit users',

            'view company profile',
            'edit company profile',
        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        $admin = \App\Models\User::findOrFail(1);
        foreach ($permissions as $permission) {
            $admin->givePermissionTo($permission);
        }

        $permissions = [
            'create jobs',
            'view jobs',
            'edit jobs',
            'delete jobs',

            'view employee',
            'edit employee',
            'create employee',
            'delete employee',

            'view job application',
            'edit job application',

            'view company profile',
            'edit company profile',
        ];

        $company = \App\Models\User::findOrFail(2);
        foreach ($permissions as $permission) {
            $company->givePermissionTo($permissions);
        }


    }
}
