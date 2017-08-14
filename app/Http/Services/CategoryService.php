<?php

namespace App\Http\Services;

use App\Http\Repositories\CategoryRepository;
use Illuminate\Support\Facades\DB;
use League\Flysystem\Exception;

class CategoryService
{
    /**
     * 注入CategoryRepository
     * @var
     */
    protected $category;

    /**
     * 注入
     */
    public function __construct(CategoryRepository $category)
    {
        $this->category = $category;
    }

    /**
     * 获取category模型
     * @return CategoryRepository
     */
    public function getCategoryModel()
    {
        return $this->category->getCategoryModel();
    }

    /**
     * 获取所有分类
     */
    public function getAllCates()
    {
        return $this->getCategoryModel()->all();
    }

    /**
     * 通过分类id获取分类
     * @param $id
     * @return mixed
     */
    public function getCategoryById($id)
    {
        return $this->category->getCategoryModel()->find($id);
    }

    /**
     * 获得所有分类，呈树形结构
     */
    public function getTreeCategory()
    {

    }

    /**
     * 批量删除分类
     */
    public function batchDelCategory($ids)
    {
        try {
            DB::beginTransaction();
            foreach ($ids as $id) {
                $this->category->getCategoryModel()->where('id', $id)->delete();
            }
            DB::commit();
            return true;
        }catch (Exception $e) {
            DB::rollback();
            return false;
        }

    }
}