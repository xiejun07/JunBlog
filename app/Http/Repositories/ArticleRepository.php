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
}