<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class LoginController extends Controller
{
    /**
     *登陆页
     */
    public function index()
    {
        return view('Home.user.login');
    }

    /**
     *保存登陆信息
     */
    public function login(Request $request)
    {
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|min:5|max:10',
            'is_remember' => 'integer'
        ]);
        $remember = boolval($request['is_remember']);
        if (Auth::attempt(['email' => $request['email'], 'password' => $request['password']], $remember)) {
            // 用户处于活动状态，不被暂停，并且存在。
            return redirect('/posts');
        }
        return redirect()->back()->withErrors('登陆失败');
    }

    /**
     *用户退出
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/posts');
    }
}
