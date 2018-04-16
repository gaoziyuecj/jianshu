<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    /**
     *个人设置页
     */
    public function setting()
    {
        return view('Home.user.setting');
    }

    /**
     *保存个人信息
     */
    public function settingStore()
    {

    }
}
