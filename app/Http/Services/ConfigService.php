<?php

namespace App\Http\Services;

use App\Http\Repositories\ConfigRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class ConfigService
{
    protected $config;

    public function __construct(ConfigRepository $config)
    {
        $this->config = $config;
    }

    public function getConfigModel()
    {
        return $this->config->getConfigModel();
    }

    public function getList()
    {
        Request::flash();
        $orderBy = Request::input('orderBy', 'conf_sort');
        $sort = Request::input('conf_sort', 'desc');
        $page = (int)Request::input('page', 1);
        $length = (int)Request::input('length', 10);

        return $data = $this->getConfigModel()
            ->orderBy($orderBy, $sort)
            ->paginate($length);
    }

    /**
     * 批量删除分类
     */
    public function batchDelConfigs($ids)
    {
        try {
            DB::beginTransaction();
            foreach ($ids as $id) {
                $this->config->getConfigModel()->where('id', $id)->delete();
            }
            DB::commit();
            return true;
        }catch (Exception $e) {
            DB::rollback();
            return false;
        }
    }

    public function saveConfValue($value, $id)
    {
        return $this->getConfigModel()->where('id', $id)->update(['conf_value'=> $value]);
    }

}