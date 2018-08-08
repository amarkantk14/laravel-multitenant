<?php
namespace App\Http\Controllers\Api\SuperAdmin;
use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use App\Http\Traits\UserDriverTrait;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    use UserDriverTrait, AuthTrait;
    use UserDriverTrait {
        UserDriverTrait::__construct as private __pConstruct;
    }

    public function __construct()
    {
        $this->__pConstruct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->isSuperAdmin() ? Permission::all(['id','name']) : [];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function show(Permission $permission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function edit(Permission $permission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Permission $permission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Permission  $permission
     * @return \Illuminate\Http\Response
     */
    public function destroy(Permission $permission)
    {
        //
    }

    /**
     *
     */
    public function assignPermission () {
        if ($this->isSuperAdmin()) {
            $user = $this->loggedInUser();
            if ($user->hasRole(Role::SUPER_ADMIN_NAME)) {
                $user->removeRole(Role::SUPER_ADMIN_NAME);
            }
            $role = Role::where('id', '=', Role::SUPER_ADMIN_ID)->firstOrFail();
            $permissions = Permission::all();
            if (isset($permissions) && !empty($permissions)) {
                foreach ($permissions as $permission) {
                    $role->revokePermissionTo($permission);
                }
                $role->syncPermissions($permissions);
            }
            $user->assignRole($role);
            $user['permissions'] =  [$user->getAllPermissions()];
            unset($user['permissions']);
            return response()->json([
                'message' => 'Successfully assigned role and permission',
                'result' => $user
            ]);
        }
        return [];
    }
}
