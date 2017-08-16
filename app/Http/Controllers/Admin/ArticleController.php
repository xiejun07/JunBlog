<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\CommonController;
use App\Http\Services\ArticleService;
use App\Http\Services\CategoryService;

class ArticleController extends CommonController
{
    protected $articleService;

    protected $categoryService;

    public function __construct(ArticleService $articleService, CategoryService $categoryService)
    {
        $this->articleService = $articleService;
        $this->categoryService = $categoryService;
    }

    /**
     * 文章列表
     */
    public function getList()
    {
        return view('admin.article.list');
    }

    /**
     * 发表文章
     */
    public function create()
    {
        // 所有分类
        $categories = $this->categoryService->getAllCates();
        return view('admin.article.add', compact('categories'));
    }

    /**
     * 保存新建信息
     */
    public function store()
    {

    }

    /**
     * 上传图片到本地
     */
    public function uploadImgToLocal()
    {

    }

    /**
     * 显示编辑页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit()
    {
        return view('admin.article.edit');
    }

    /**
     * 保存编辑内容
     */
    public function update()
    {

    }

    /**
     * 删除
     */
    public function delete()
    {

    }
}
