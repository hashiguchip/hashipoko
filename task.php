#!/usr/bin/env php
<?php

use app\classes\Kernel;

require_once __DIR__ . "/vendor/autoload.php";
require_once __DIR__ . "/app/classes/core/kernel.php";

//--------

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => '127.0.0.1',
    'database' => 'database name',
    'username' => 'root',
    'password' => '',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

//----ここおまで

$kernel = Kernel::init();

$request = $kernel->requestParser();

//run
$kernel->taskRun($request);

//exit

//$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
//
//$status = $kernel->handle
//(
//    $input = new Symfony\Component\Console\Input\ArgvInput,
//    new Symfony\Component\Console\Output\ConsoleOutput
//);
//
//$kernel->terminate($input, $status);
//
//exit($status);