<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Controllers\CommonController;
use App\Http\Services\CategoryService;
use App\Http\Requests\CategoryRequest;

class CategoryController extends CommonController
{
    /**
     * 注入categoryService
     * @var
     */
    protected $categoryService;

    /**
     * 注入
     */
    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = $this->categoryService->getAllCates();
        return view('admin.category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取所有分类 树形排列
        $categories = $this->categoryService->getAllCates();
        return view('admin.category.add', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->categoryService->getCategoryModel()->create($request->except('_token'));
        return $category ? $this->commonAjaxReturn() : back()->withInput();
//        return $category ? redirect("/category/{$category->id}") : back()->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->categoryService->getCategoryById($id);
        return view('admin.category.add', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取所有分类 树形排列
        $categories = $this->categoryService->getAllCates();

        $data = $this->categoryService->getCategoryById($id);
        return view('admin.category.edit', compact('categories', 'data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $res = $this->categoryService->getCategoryById($id)->update($request->except('_token'));
        return $res ? $this->commonAjaxReturn() : $this->commonAjaxReturn(false, '编辑失败！请稍后再试');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $res = $this->categoryService->getCategoryModel()->where('id', $id)->delete();
        return $res ? $this->commonAjaxReturn() : $this->commonAjaxReturn(false, '删除失败！请稍后再试');
    }

    /**
     * 批量删除
     */
    public function batchDel(Request $request)
    {
        $res = $this->categoryService->batchDelCategory($request->input('id_arr'));
        return $res ? $this->commonAjaxReturn() : $this->commonAjaxReturn(false, '批量删除失败！请稍后再试');
    }
}
