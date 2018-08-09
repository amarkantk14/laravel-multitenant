<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use App\Http\Traits\RolePermissionTrait;
use App\Http\Traits\UserDriverTrait;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
	use UserDriverTrait, AuthTrait, RolePermissionTrait;
	use UserDriverTrait {
		UserDriverTrait::__construct as private __pConstruct;
	}
	public function __construct()
	{
		$this->__pConstruct();
	}
	/**
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
	public function index() {
		return User::all();
	}

	/**
	 * @param Request $request
	 * @return array
     */
	public function store(Request $request)
	{
		$user = auth()->user();
		if($user->hasPermissionTo('create users')) {
			$this->userDriverSetup($user);

			return $request->all();
		}
	}
}
