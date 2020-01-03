<?php

namespace app\classes\core;

/**
 * request情報をもとに必要な情報を解析し
 * インターフェイスにセットする
 *
 *
 * Class requestParser
 */
class requestParser
{
    /**
     * @var
     */
    private $controller;
    /**
     * @var
     */
    private $httpMethod;

    public function __construct()
    {
//        echo __CLASS__ . ":" . __line__;
//        print'<pre>';
//        var_dump($argv);
//        print'</pre>';
//        exit;
    }

    public function getController()
    {
        return $this->controller;
    }

    public function isPost()
    {
        return $this->httpMethod === 'post';
    }

    public function isGet()
    {
        return $this->httpMethod === 'get';
    }

    public function setController($controller)
    {
        $this->controller = $controller;
        return true;
    }

}