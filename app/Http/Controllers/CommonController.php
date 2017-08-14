<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    /**
     * ajax return 返回相应的数据
     */
    public function commonAjaxReturn($status = true, $content = '操作成功!')
    {
        return response()->json(['status' => $status, 'content' => $content]);
    }

}