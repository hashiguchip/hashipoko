<?php

namespace app\classes\core;

/**
 * @property Config
 */
class Config
{
    public function __construct()
    {
    }

    public static function get($configKey)
    {
        //todo :ドット区切りなら like fuel
        $configs = include __DIR__ . '/../../../config/app.php';//todo:いい感じに。。。汗
        if (array_key_exists($configKey, $configs)) {
            return $configs[$configKey];
        }
        return false;
    }
}

