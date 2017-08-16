<?php

namespace App\Http\Services;

use App\Http\Repositories\ArticleRepository;

class ArticleService
{
    protected $article;

    public function __construct(ArticleRepository $article)
    {
        $this->article = $article;
    }

    public function getArticleModel()
    {
        return $this->article->getArticleModel();
    }

}