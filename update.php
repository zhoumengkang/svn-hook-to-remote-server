<?php
/**
 * svn服务器上的钩子需要模拟访问的文件，必须是外网可以访问的
 * 存放在远程服务器上
 * @author  zhoumengkang <i@zhoumengkang.com>
 */
error_reporting(E_ALL);

//"/home/wwwroot/test/" 为代码更新到的指定目录路径

$handle = popen('svn up --username zmk --password 123456 /home/wwwroot/test/ 2>&1','r');
echo "'$handle'; " . gettype($handle) . "\n";
$read = fread($handle, 2096);
echo $read;
pclose($handle);
