<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    /**
     * 注册用户
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * 用户详细
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * 保存用户信息
     * @param  Request $request 请求数据
     * @return 无
     */
    public function store(Request $request)
    {
        // 用户信息校验
        $this->validate($request, [
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required'
        ]);

        // 保存用户信息
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        Auth::login($user);
        session()->flash('success', '欢迎，您将在这里开启一段新的旅程~');
        return redirect()->route('users.show', [$user]);
    }
}
