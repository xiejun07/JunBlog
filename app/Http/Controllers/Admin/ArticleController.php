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
}
