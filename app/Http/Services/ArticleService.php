<?php

namespace App\Http\Services;

use App\Http\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\ArticleContentRepository;

class ArticleService
{
    /**
     * 注入articleRepository
     * @var ArticleRepository
     */
    protected $article;

    /**
     * 注入ArticleContentRepository
     * @var
     */
    protected $articleContent;

    /**
     * 初始化注入
     * @param ArticleRepository $article
     * @param ArticleContentRepository $articleContent
     */
    public function __construct(ArticleRepository $article, ArticleContentRepository $articleContent)
    {
        $this->article = $article;
        $this->articleContent = $articleContent;
    }

    public function getArticleModel()
    {
        return $this->article->getArticleModel();
    }

    public function getArticleContentModel()
    {
        return $this->articleContent->getArticleContentModel();
    }

    /**
     * 保存新建文章信息
     * @param $content_id
     * @param $params
     * @return static
     */
    public function saveCreate($content_id, $params)
    {
        $params['content_id'] = $content_id;
//        $params['art_author'] = Auth::user()->id;
        $params['art_author'] = 1;

        return $this->article->getArticleModel()->create($params);
    }

    /**
     * 保存文章富文本内容
     * @param $content
     * @return mixed
     */
    public function saveContent($content)
    {
        return $content_id = $this->articleContent->getArticleContentModel()->insertGetId(['content' => $content]);
    }

    /**
     * 文章列表
     * @return mixed
     */
    public function getList()
    {
        Request::flash();
        $orderBy = Request::input('orderBy', 'art_sort');
        $sort = Request::input('art_sort', 'desc');
        $page = (int)Request::input('page', 1);
        $length = (int)Request::input('length', 10);

        return $data = $this->getArticleModel()
            ->orderBy($orderBy, $sort)
            ->paginate($length);
    }

    /**
     * 更新保存文章富文本内容表
     * @param $content
     * @param $id
     * @return mixed
     */
    public function updateContent($content, $id)
    {
        return $this->articleContent->getArticleContentModel()->where('id', $id)->update(['content' => $content]);
    }

    /**
     * 更新文章主表修改
     * @param $params
     * @param $id
     */
    public function updateArticle($params, $id)
    {
        $this->getArticleModel()->where('id', $id)->update($params);
    }

    /**
     * 获取文章id对应的content_id
     * @param $id_arr
     * @return mixed
     */
    public function getContentIds($id_arr)
    {
        return $this->article->getContentIdByArticleId($id_arr);
    }

    /**
     * 删除文章内容表数据
     * @param $data
     * @return mixed
     */
    public function deleteContent($data)
    {
        return $this->articleContent->deleteContent($data);
    }

    /**
     * 删除文章表数据
     * @param $data
     * @return mixed
     */
    public function deleteArticle($data)
    {
        return $this->article->deleteArticle($data);
    }
}