<?php
namespace App\Http\Presenters;

use App\Http\Presenters\ConfigConfTypePresenterInterface;

class ConfigConfTypesTextareaPresenters implements ConfigConfTypePresenterInterface
{
    public function showConfigConfTypes($config)
    {
        $html = <<<EOL
    <textarea name="conf_value" style="width:100%;"></textarea>
EOL;
        return $html;
    }
}