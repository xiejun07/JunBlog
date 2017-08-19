<?php
namespace App\Http\Presenters;

interface ConfigConfTypePresenterInterface
{
    // 根据不同的conf_type显示不同的内容
    public function showConfigConfTypes($config);
}