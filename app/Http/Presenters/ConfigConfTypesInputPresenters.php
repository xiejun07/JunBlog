<?php
namespace App\Http\Presenters;

use App\Http\Presenters\ConfigConfTypePresenterInterface;

class ConfigConfTypesInputPresenters implements ConfigConfTypePresenterInterface
{
    public function showConfigConfTypes($config)
    {
        $html = <<<EOL
    <input type="text" name="conf_value" value="$config->conf_value" style="width: 100%">
EOL;
        return $html;
    }
}