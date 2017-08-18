<?php

namespace App\Http\Services;

use App\Http\Repositories\FlinkRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class FlinkService
{
    protected $flink;

    public function __construct(FlinkRepository $flink)
    {
        $this->flink = $flink;
    }

    public function getFlinkModel()
    {
        return $this->flink->getFlinkModel();
    }

    public function getList()
    {
        Request::flash();
        $orderBy = Request::input('orderBy', 'link_sort');
        $sort = Request::input('link_sort', 'desc');
        $page = (int)Request::input('page', 1);
        $length = (int)Request::input('length', 10);

        return $data = $this->getFlinkModel()
            ->orderBy($orderBy, $sort)
            ->paginate($length);
    }

    /**
     * 批量删除分类
     */
    public function batchDelFlinks($ids)
    {
        try {
            DB::beginTransaction();
            foreach ($ids as $id) {
                $this->flink->getFlinkModel()->where('id', $id)->delete();
            }
            DB::commit();
            return true;
        }catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }

}