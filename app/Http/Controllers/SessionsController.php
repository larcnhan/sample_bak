<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;

class SessionsController extends Controller
{
    /**
     * 显示登录页面
     * @return
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * 登录
     * @return
     */
    public function store(Request $request)
    {
        // 校验数据
        $this->validate($request, [
            'email' => 'required|email|max:25',
            'password' => 'required',
        ]);

        // 认证数据
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        // 身份认证
        if (Auth::attempt($credentials, $request->has('remember'))) {
            // 认证成功
            session()->flash('success', '欢迎回来！');
            return redirect()->route('users.show', [Auth::user()]);
        } else {
            // 认证失败
            session()->flash('danger', '很抱歉，您的邮箱和密码不匹配');
            return redirect()->back();
        }
    }

    /**
     * 注销
     * @return
     */
    public function destory()
    {
        Auth::logout();
        session()->flash('success', '您已成功退出！');
        return redirect('login');
    }
}
