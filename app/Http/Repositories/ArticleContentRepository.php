<?php

namespace App\Http\Repositories;

use App\Http\Models\ArticleContent;

class ArticleContentRepository
{
    protected $articleContent;

    public function __construct(ArticleContent $articleContent)
    {
        $this->articleContent = $articleContent;
    }

    public function getArticleContentModel()
    {
        return $this->articleContent;
    }
}