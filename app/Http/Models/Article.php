<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'blog_article';

    protected $guarded = [];

    /**
     * 文章表获得关联发表用户的信息
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function articleToUser()
    {
        return $this->hasOne('App\Http\Models\User', 'id', 'art_author');
    }

    /**
     * 文章表关联得到对应的分类信息
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function articleToCate()
    {
        return $this->hasOne('App\Http\Models\Category', 'id', 'cate_id');
    }

    /**
     * 文章表关联文章富文本内容表
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function articleGetContent()
    {
        return $this->hasOne('App\Http\Models\ArticleContent', 'id', 'content_id');
    }
}
