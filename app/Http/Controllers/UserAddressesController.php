<?php

namespace App\Http\Controllers;

use App\Models\UserAddress;
use Illuminate\Http\Request;

class UserAddressesController extends Controller
{
    /**
     * 显示当前用户地址
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('user_addresses.index', [
            'addresses' => $request->user()->addresses,
        ]);
    }

    public function create(UserAddress $userAddress)
    {
        return view('user_addresses.create_and_edit', compact('userAddress'));
    }
}
