<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Traits\UserDriverTrait;
use App\Task;
use App\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    use UserDriverTrait;
    use UserDriverTrait {
        UserDriverTrait::__construct as private __pConstruct;
    }

    public function __construct()
    {
        $this->__pConstruct();
    }

    public function index(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required'
        ]);
        $user = User::find($request->user_id);
        $this->userDriverSetup($user);
        return Task::all();
    }

    /**
     * @param Request $request
     * @return array
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required'
        ]);

        $user = User::find($request->user_id);
        $this->userDriverSetup($user);
        Task::create([
            'task_name' => $request->task_name
        ]);

        return ['status' => 'success'];
    }
}