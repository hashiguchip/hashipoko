<?php

namespace app\classes\util;

/**
 * Class Dir Directoryを扱うクラス
 * @package app\classes\util
 */
class Dir
{
    public static function isExist($dirPath)
    {
        return is_dir($dirPath);
    }

    /**
     *
     *
     * @param $dirPath
     * @return bool
     */
    public static function removeDir($dirPath)
    {
        return rmdir($dirPath);
    }

    public static function createDir($dirPath)
    {
        //if ok
        return mkdir($dirPath);
    }
}