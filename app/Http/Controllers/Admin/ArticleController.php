<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\CommonController;
use App\Http\Services\ArticleService;
use App\Http\Services\CategoryService;

class ArticleController extends CommonController
{
    /**
     * 上传文件保存在public文件夹的路径
     * @var string
     */
    protected $uploadSave = '/uploads/upload/';

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
    public function store(Request $request)
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
    public function uploadImgToLocal(Request $request)
    {

        $file = $request->file('fileData');
        // 验证
        $res = $this->checkFile($file);
        if ($res !== true) {
            return $res;
        }

        // 获取临时文件路径
        $realPath = $file->getRealPath();
        // 保存文件目录
        $savePath = '/uploads/upload/'. date('Y-m-d', time()). '/';
        // 绝对保存路径为   public_path(). '/uploads/upload/'. date('Y-m-d', time()). '/'
        is_dir(public_path(). $savePath) ? null : mkdir(public_path(). $savePath, 0777, true);
        // 拼接保存的文件名
        $fileName = time(). '_'. iconv('UTF-8','UTF-8',$file->getClientOriginalName()); // . '.' . $file->getClientOriginalExtension();

        // 将临时文件移动到保存路径中
        if (!$file->move(public_path(). $savePath, $fileName)) {
            return $this->commonAjaxReturn(false, '文件保存失败！');
        }

        return response()->json(['status' => true, 'pathContent' => $savePath.$fileName, 'content' => '文件上传保存成功！']);
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
            return $this->commonAjaxReturn(false, '上传图片类型不支持!');
        }
        return true;
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
    public function update()
    {

    }

    /**
     * 删除
     */
    public function delete(Request $request)
    {
        $res = $this->articleService->getArticleModel()->where('id', $request->id)->delete();
        return $res ? $this->commonAjaxReturn() : $this->commonAjaxReturn(false, '删除失败！请稍后再试');
    }
}
