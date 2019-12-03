<?php
// [ 应用入口文件 ]
error_reporting(E_ERROR | E_WARNING | E_PARSE);

//报告所有错误

error_reporting(E_ALL);

ini_set("display_errors", "On");
// 定义应用目录
define('APP_PATH', __DIR__ . '/../app/');
define('RUNTIME_PATH', '../runtime/');//缓存目录
define('ADMIN_STATUS', 'XHADMIN');
// $build = include APP_PATH.'build.php';
// \think\Build::run($build);
// 加载框架引导文件
 require __DIR__ . '/../thinkphp/start.php';
