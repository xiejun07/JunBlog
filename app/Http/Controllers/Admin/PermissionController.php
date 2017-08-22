<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
    public function login()
    {
        return view('admin.permission.login', compact('user'));
    }

    public function checkLogin(Request $request)
    {
        $params = [
            'name' => $request->username,
            'password' => $request->password
        ];
        $remember = $request->code ? true : false;
        $login = Auth::attempt($params, $remember);
        return $login ? redirect('/') : back()->with('errors','用户名或者密码错误！');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function editUser()
    {
        $id = \Request::input('id');
        return view('admin.permission.chpass');
    }
}
