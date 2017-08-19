<?php

namespace App\Http\Presenters;

use App\Http\Presenters\ConfigConfTypesPresentersFactory;

class ConfigPresenters
{
    public function bindConfigConfTypesPresenters($config)
    {
        if ($config->conf_type == 0) { // input
            return ConfigConfTypesPresentersFactory::bind('Input');
        }
        if ($config->conf_type == 1) { // radio
            ConfigConfTypesPresentersFactory::bind('Radio');
        }
        if ($config->conf_type == 2) { // textarea
            return ConfigConfTypesPresentersFactory::bind('Textarea');
        }
    }

    public function showConfTypes($config)
    {
        if ($config->conf_type == 0) { // input
            $html = <<<EOL
<input style="width: 100%;" class="conf_value$config->id" type="text" name="conf_value" value="$config->conf_value" />
EOL;
            return $html;
        }
        if ($config->conf_type == 1) { // radio
            $html = '';
            foreach (explode(',', $config->conf_fields) as $choose) {
                $is_checked = $config->conf_value == $choose ? 'checked' : '';
                $html .= "<input class='conf_value". $config->id. "' type='radio' name='conf_value' value='". $choose. "'". $is_checked. "/>". $choose.'&nbsp;&nbsp;&nbsp;&nbsp;';
            }
            return $html;
        }
        if ($config->conf_type == 2) { // textarea
            $html = <<<EOL
<textarea style="width: 100%;" class="conf_value$config->id" name="conf_type">$config->conf_value</textarea>
EOL;
            return $html;
        }
    }
}