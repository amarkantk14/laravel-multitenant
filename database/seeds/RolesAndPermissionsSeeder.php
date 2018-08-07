<?php
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');
        foreach(['web'] as $guard_name) {
            $this->addRolesAndPermissions($guard_name);
        }
    }

    private function addRolesAndPermissions($guard_name)
    {
        $adminPermissions = collect(
            [
                'create users',
                'edit users',
                'delete users',
                'publish users',
                'create store',
                'edit store',
                'delete store',
                'publish store',
                'un-publish store'
            ])->map(function ($name) use ($guard_name) {
            return Permission::create(['name' => $name, 'guard_name' => $guard_name]);
        });
        $adminRole = Role::create(['name' => 'admin', 'guard_name' => $guard_name]);
        $adminRole->givePermissionTo($adminPermissions);
        $role = Role::create(['name' => 'super-admin', 'guard_name' => $guard_name]);
        $role->givePermissionTo($adminPermissions);
    }
}
