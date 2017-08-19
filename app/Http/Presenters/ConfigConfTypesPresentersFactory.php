<?php
namespace App\Http\Presenters;

use App\Http\Presenters\ConfigConfTypePresenterInterface;

class ConfigConfTypesPresentersFactory
{
    public static function bind(string $type)
    {
        $class = 'App\Http\Presenters\ConfigConfTypes'.$type.'Presenters';
        $mark = new $class();

        app()->singleton(ConfigConfTypePresenterInterface::class, function() use ($mark) {
            return $mark;
        });
    }
}