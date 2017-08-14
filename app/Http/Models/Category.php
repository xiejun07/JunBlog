<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'blog_category';

    protected $fillable = ['cate_name','cate_pid','cate_description','sort','created_at','updated_at'];
}
