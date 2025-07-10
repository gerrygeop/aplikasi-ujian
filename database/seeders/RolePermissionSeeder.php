<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view courses',
            'create courses',
            'edit courses',
            'delete courses',
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }

        $teacherRole = Role::create(['name' => 'teacher']);
        $teacherRole->givePermissionTo($permissions);

        $studentRole = Role::create(['name' => 'student']);
        $studentRole->givePermissionTo('view courses');

        $user = User::factory()->create([
            'name' => 'Fanny',
            'email' => 'fannyteacher@example.com'
        ]);

        $user->assignRole($teacherRole);
    }
}
