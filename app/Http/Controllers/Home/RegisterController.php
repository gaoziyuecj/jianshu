<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class RegisterController extends Controller
{
    /**
     *注册页
     */
    public function index()
    {
        return view('Home.user.register');
    }

    /**
     *保存注册信息
     */
    public function register(Request $request)
    {
        $this->validate(request(), [
            'name' => 'bail|required|min:4|unique:users,name',
            'email' => 'required|unique:users,email|email',
            'password' => 'required|min:5|max:10|confirmed'
        ]);
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => bcrypt($request['password'])
        ];
        User::create($data);
        return redirect('/login');
    }
}
