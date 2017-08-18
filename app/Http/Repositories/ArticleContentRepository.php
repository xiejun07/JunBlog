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

    public function deleteContent($data)
    {
        if (is_array($data)) {
            return $this->articleContent->whereIn('id', $data)->delete();
        }
        if (is_numeric($data)) {
            return $this->articleContent->where('id', $data)->delete();
        }
    }
}