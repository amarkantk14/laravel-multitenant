<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
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
	public function store(Request $request) {
    	User::create([
    		'name' => $request->name,
    		'email' => $request->name . '@example.com',
    		'password' => 'secret',
    	]);

        return ['status' => 'success'];
    }
}
