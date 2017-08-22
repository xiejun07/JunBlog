<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CommonController;
use Illuminate\Support\Facades\Auth;

class IndexController extends CommonController
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.index', compact('user'));
    }

    public function info()
    {
        return view('admin.info');
    }
}
