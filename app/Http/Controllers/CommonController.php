<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    /**
     * 上传文件保存在public文件夹的路径
     * @var string
     */
    protected $uploadSave = '/uploads/upload/';

    /**
     * ajax return 返回相应的数据
     */
    public function commonAjaxReturn($status = true, $content = '操作成功!')
    {
        return response()->json(['status' => $status, 'content' => $content]);
    }

    /**
     * 上传文件 传入一个file对象
     * @param $file
     */
    public function uploadImg($file)
    {
        // 获取临时文件路径
        $realPath = $file->getRealPath();
        // 保存文件目录
        $savePath = $this->uploadSave. date('Y-m-d', time()). '/';
        // 绝对保存路径为   public_path(). '/uploads/upload/'. date('Y-m-d', time()). '/'
        is_dir(public_path(). $savePath) ? null : mkdir(public_path(). $savePath, 0777, true);
        // 拼接保存的文件名
        $fileName = time(). '_'. iconv('UTF-8','UTF-8',$file->getClientOriginalName()); // . '.' . $file->getClientOriginalExtension();

        // 将临时文件移动到保存路径中
        if (!$file->move(public_path(). $savePath, $fileName)) {
            return false;
        }
        return $pathContent = $savePath.$fileName;
    }

    /**
     * 上传文件的验证
     * @param $file
     * @return bool|\Illuminate\Http\JsonResponse
     */
    public function checkFile($file)
    {
        if (!$file->isValid()) {
            return $this->commonAjaxReturn(false, '上传图片失败！');
        }
        if ($file->getClientSize() > $file->getMaxFileSize()) {
            return $this->commonAjaxReturn(false, '上传图片大小超过'. ($file->getMaxFileSize()/1024/1024). 'M!');
        }
        $allowTypes = ['png', 'jpg', 'gif', 'jpeg', 'bmp'];
        if (!in_array(strtolower($file->getClientOriginalExtension()), $allowTypes)) {
            return false;
        }
        return true;
    }
}