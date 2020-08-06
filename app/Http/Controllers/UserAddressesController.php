<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddressRequest;
use App\Models\User;
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

    /**
     * @param UserAddress $address
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(UserAddress $user_address)
    {
        return view('user_addresses.create_and_edit', compact('user_address'));
    }

    /**
     * 新增地址
     * @param UserAddressRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserAddressRequest $request)
    {
        $request->user()->addresses()->create($request->only([
            'province',
            'city',
            'district',
            'address',
            'zip',
            'contact_name',
            'contact_phone',
        ]));
        return redirect()->route('user_addresses.index');
    }

    /**
     * @param UserAddress $user_address
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(UserAddress $user_address)
    {
        $this->authorize('own', $user_address);
        return view('user_addresses.create_and_edit', compact('user_address'));
    }

    /**
     * 编辑地址
     * @param UserAddress $user_address
     * @param UserAddressRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserAddress $user_address, UserAddressRequest $request)
    {
        $this->authorize('own', $user_address);
        $user_address->update($request->only([
            'province',
            'city',
            'district',
            'address',
            'zip',
            'contact_name',
            'contact_phone',
        ]));
        return redirect()->route('user_addresses.index');
    }

    /**
     * 删除地址
     * @param UserAddress $user_address
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(UserAddress $user_address)
    {
        $this->authorize('own', $user_address);
        $user_address->delete();
        return [];
    }
}
