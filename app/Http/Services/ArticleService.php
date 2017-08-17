<?php

namespace App\Http\Services;

use App\Http\Repositories\ArticleRepository;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Repositories\ArticleContentRepository;

class ArticleService
{
    protected $article;

    protected $articleContent;

    public function __construct(ArticleRepository $article, ArticleContentRepository $articleContent)
    {
        $this->article = $article;
        $this->articleContent = $articleContent;
    }

    public function getArticleModel()
    {
        return $this->article->getArticleModel();
    }

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

}