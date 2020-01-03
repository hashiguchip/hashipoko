<?php

namespace app\classes\util;


class File
{
    /**
     *
     * @param $fileName string
     */
    static function createFile($fileName)
    {

    }

    /**
     * ディレクトリごとファイル作成する
     * @param $dirPath string
     * @param $fileName string
     */
    static function createDirFile($dirPath, $fileName)
    {
        if (!Dir::isExist($dirPath)) Dir::createDir($dirPath);

        self::createFile($dirPath . $fileName);
    }

    /**
     * コンテンツを指定のファイルに書き出す
     *
     * @param $content
     * @param $dirPath
     * @param $fileName
     * @param bool $forge
     *
     * @return bool
     */
    static function outputToFile($content, $dirPath, $fileName, $forge = true)
    {
        self::createDirFile($dirPath, $fileName);

        $writtenByte = file_put_contents($dirPath . '/' . $fileName, $content);
        return !empty($writtenByte);
    }

}