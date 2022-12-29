<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        /* Ресурсы */
        /*Permission::create(['name' => 'drivers-index',  'guard_name' => 'bash' ]);
        Permission::create(['name' => 'drivers-create', 'guard_name' => 'bash' ]);
        Permission::create(['name' => 'drivers-update', 'guard_name' => 'bash' ]);
        Permission::create(['name' => 'drivers-delete', 'guard_name' => 'bash' ]);*/

        $role = Role::create(['name' => 'Администратор', 'guard_name' => 'bash' ]);
        $role->givePermissionTo(Permission::all());
        $user = User::where('id', 1)->first();
		$user->assignRole($role);

        Role::create(['name' => 'Пользователь', 'guard_name' => 'bash' ]);
    }
}
