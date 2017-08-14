<?php

namespace App\Http\Repositories;

use App\Http\Models\Category;

class CategoryRepository
{
    /**
     * 注入CategoryModel
     * @var Category
     */
    protected $category;

    /**
     * 注入
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function getCategoryModel()
    {
        return $this->category;
    }
}