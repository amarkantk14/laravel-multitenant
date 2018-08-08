<?php
namespace App\Http\Traits;

use App\Permission;
use App\Role;

trait RolePermissionTrait
{
    public function __construct()
    {

    }

    /**
     * @param array $roles
     * @param array $permissions
     * @return array
     */
    public function assignPermissionsToRoles($roles = [], $permissions = [])
    {
        $roles = Role::whereIn('id', $roles)->get();
        foreach ($roles as $role) {
            foreach ($role->permissions as $p) {
                $role->revokePermissionTo($p);
            }
        }
        $permissions = Permission::whereIn('id', $permissions)->get();
        if (!$roles->isEmpty() && !$permissions->isEmpty()) {
            foreach ($roles as $role) {
                foreach ($permissions as $permission) {
                    $role->revokePermissionTo($permission);
                }
                $role->syncPermissions($permissions);
            }
        }
        $result = $roles->map(function ($role) {
            $role['permissions'] = [$role->permissions];
            return $role;
        });
        return $result;

    }
}