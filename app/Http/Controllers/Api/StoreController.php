<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Traits\UserDriverTrait;
use App\Store;
use App\User;
use Illuminate\Http\Request;

class StoreController extends Controller
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
        return Store::all();
    }

    /**
     * @param Request $request
     * @return array|int
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'name' => 'required',
            'address' => 'required',
            'website' => 'required',
            'email' => 'required'
        ]);
        $user = User::find($request->user_id);
        $this->userDriverSetup($user);
        Store::create([
            'name' => $request->name,
            'address' => $request->address,
            'website' => $request->website,
            'account' => $this->getAccountName($request->website),
            'email' => $request->email,
            'is_active' => 0
        ]);

        return ['status' => 'success'];
    }

    private function getAccountName ($inputText) {
        $account = @parse_url($inputText, PHP_URL_HOST);
        if (substr($account, 0, 4) === "www.") {
            $account = explode('.', substr($account, 4))[0];
        }
        return $account;
    }
}