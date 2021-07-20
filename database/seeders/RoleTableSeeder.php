<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //add role
        $roles = ['superadmin', 'student', 'lecturer'];

        foreach ($roles as $key => $value) {
            Role::create(['name' => $value]);
        }
        //add user
        $superadmin = [
                'name' => 'Superadmin',
                'email' => 'superadmin@local.com',
                'password' => bcrypt('repo1234'),
        ];
        User::create($superadmin)->assignRole('superadmin');

        $student = ['mahasiswa1', 'mahasiswa2', 'mahasiswa3', 'mahasiswa4', 'mahasiswa5'];

        foreach($student as $st)
        {
            User::create(
                ['name' => $st,
                'email' => $st.'@gmail.com',
                'password' => bcrypt('repo1234')]
            )
            ->assignRole('student');
        }

        $lecturer = ['dosen1', 'dosen2'];

        foreach($lecturer as $lt)
        {
            User::create(
                ['name' => $lt,
                'email' => $lt.'@gmail.com',
                'password' => bcrypt('repo1234')]
            )
            ->assignRole('lecturer');
        }
    }
}

