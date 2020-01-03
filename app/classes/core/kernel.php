<?php

namespace app\classes;

use app\classes\core\requestParser;
use tasks\backupTemplate;

/**
 * @property Kernel
 */
class Kernel
{
    private static $instance;

    private function __construct()
    {
        //should not construct
    }

    public function run($request, $response)
    {
        return "rurnurr";
        //todo:リクエストを元に
    }

    /**
     * taskをrunする
     *
     * @param $params
     */
    public function taskRun($params)
    {
        $aaa = $params->getController();
        if ("からじゃなかったら") {
            $controller = new backupTemplate();
        }
        //todo:なにもんかったら
        $controller->index();

    }

    /**
     * リクエストを元にコントローラを確定させる
     * そしてコントローラobjectを返せばいい。。
     *
     * @param $params
     */
    public function request($params)
    {
        //コントローラがあるかどうか
    }

    public function setOption($params)
    {
        //なにか必要な場合は
    }

    /**
     * @return Kernel
     */
    public static function init()
    {
        if (!self::$instance) self::$instance = new Kernel;
        return self::$instance;
    }


    /**
     * @return requestParser
     */
    public function requestParser()
    {
        return new requestParser();
    }

}

