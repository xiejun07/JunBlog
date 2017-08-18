<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleContent extends Model
{
    protected $table = 'blog_article_content';

    protected $guarded = [];

    public $timestamps = false;
}