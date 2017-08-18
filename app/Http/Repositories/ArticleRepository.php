<?php

namespace App\Http\Repositories;

use App\Http\Models\Article;

class ArticleRepository
{
    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function getArticleModel()
    {
        return $this->article;
    }

    /**
     * 根据文章id返回对应的contentid 可以传数组或者数值id
     * @param $data
     * @return mixed
     */
    public function getContentIdByArticleId($data)
    {
        if (is_array($data)) {
            return $this->article->whereIn('id', $data)->pluck('content_id')->toArray();
        }
        if (is_numeric($data)) {
            return $this->article->find($data)->pluck('content_id')->toArray();
        }
    }

    /**
     * 根据文章id删除对应的文章 可以传数组或者数值的id
     * @param $data
     * @return mixed
     */
    public function deleteArticle($data)
    {
        if (is_array($data)) {
            return $this->article->whereIn('id', $data)->delete();
        }
        if (is_numeric($data)) {
            return $this->article->where('id', $data)->delete();
        }
    }

}