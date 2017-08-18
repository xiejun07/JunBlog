<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Exception\HttpResponseException;
use Illuminate\Support\Facades\Request;

use App\Http\Requests;
use App\Http\Controllers\CommonController;
use App\Http\Services\ArticleService;
use App\Http\Services\CategoryService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ArticleController extends CommonController
{
    /**
     * 注入ArticleService
     * @var ArticleService
     */
    protected $articleService;

    /**
     * 注入CategoryService
     * @var CategoryService
     */
    protected $categoryService;

    /**
     * 实例化注入
     * @param ArticleService $articleService
     * @param CategoryService $categoryService
     */
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
        $articles = $this->articleService->getList();
        return view('admin.article.list', compact('articles'));
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
    public function store(\Illuminate\Http\Request $request)
    {
        // 先插入文章内容表
        $content = $request->input('content');
        $content_id = $this->articleService->saveContent($content);

        $params = $request->only('cate_id', 'art_title', 'art_sort', 'art_description', 'art_tags', 'art_icon', 'is_public');
        $article = $this->articleService->saveCreate($content_id, $params);
        return $article ? $this->commonAjaxReturn() : $this->commonAjaxReturn(false, '新建文章保存失败!');
    }

    /**
     * 上传图片到本地
     */
    public function uploadImgToLocal(\Illuminate\Http\Request $request)
    {
        $file = $request->file('fileData');
        if (!$this->checkFile($file)) {  // 验证
            return $this->commonAjaxReturn(false, '文件保存失败！');
        }
        if (!$pathContent = $this->uploadImg($file)) {  // 上传
            return $this->commonAjaxReturn(false, '文件保存失败！');
        }
        return response()->json(['status' => true, 'pathContent' => $pathContent, 'content' => '文件上传保存成功！']);
    }

    /**
     * 显示编辑页面
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Request $request, $id)
    {
        $article = $this->articleService->getArticleModel()->find($id);
        $categories = $this->categoryService->getAllCates();

        return view('admin.article.edit', compact('article', 'categories'));
    }

    /**
     * 保存编辑内容
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            // 保存文章富文本内容修改
            $this->articleService->updateContent($request->input('content'), $request->input('c_id'));
            // 保存文章表内容
            $params = $request->only('cate_id', 'art_title', 'art_sort', 'art_description', 'art_tags', 'is_public');
            $params['art_icon'] = $request->art_icon ?: $request->old_icon;
            $this->articleService->updateArticle($params, $id);
            DB::commit();
            return $this->commonAjaxReturn();
        }catch (\Exception $e) {
            DB::rollback();
            return $this->commonAjaxReturn(false, '保存文章与内容异常回滚，请重新操作！');
//            throw new HttpResponseException(response('保存文章与内容异常回滚，请重新操作！',422));
        }
    }

    /**
     * 删除 需要同时删除文章内容表和文章表数据
     */
    public function delete(Request $request)
    {
        try{
            DB::beginTransaction();
            $this->articleService->getArticleContentModel()->where('id', $request->content_id)->delete();
            $this->articleService->getArticleModel()->where('id', $request->id)->delete();
            DB::commit();
            return $this->commonAjaxReturn();
        }catch (\Exception $e) {
            DB::rollback();
            return $this->commonAjaxReturn(false, '删除失败！请稍后再试');
        }
    }

    /**
     * 批量删除
     */
    public function batchDel()
    {
        try {
            DB::beginTransaction();
            // 找出选中文章id对应的文章内容id
            $contentIds = $this->articleService->getContentIds(Request::input('id_arr'));
            // 删除对应的文章内容
            $this->articleService->deleteContent($contentIds);
            // 删除选中的文章
            $this->articleService->deleteArticle(Request::input('id_arr'));
            DB::commit();
            return $this->commonAjaxReturn();
        }catch (\Exception $e) {
            DB::rollback();
            return $this->commonAjaxReturn(false, '批量操作失败！');
        }
    }
}
