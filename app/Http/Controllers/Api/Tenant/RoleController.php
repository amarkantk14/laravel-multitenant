<?php
namespace App\Http\Controllers\Api\Tenant;

use App\Http\Controllers\Controller;
use App\Http\Traits\UserDriverTrait;
use App\Http\Traits\AuthTrait;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
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
     * @return Response
     * @internal param Request $request
     */
    public function index()
    {
       return $this->isAdmin() ? Role::all(['id','name']) : [];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return Response
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return Response
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Role  $role
     * @return Response
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return Response
     */
    public function destroy(Role $role)
    {
        //
    }
}
