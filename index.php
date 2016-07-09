<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii/framework/yii.php';
//$yii=dirname(__FILE__).'/framework/yii.php';
$config=dirname(__FILE__).'/protected/config/main.php';
$url = $_SERVER['HTTP_HOST'];
error_reporting(E_ALL & ~E_NOTICE);
switch ($url) {
    case "localhost":
        $config=dirname(__FILE__).'/protected/config/main.php';
        break;
    case "192.168.0.123":
        $config=dirname(__FILE__).'/protected/config/main.php';
        break;
    default:
        $config=dirname(__FILE__).'/protected/config/dev.php';
        break;
}
//$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();

