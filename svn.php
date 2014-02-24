<?php
/**
 * svn钩子post-commit里执行的文件
 * 存放在svn服务器上
 */
$updateUrl = "http://zhoumengkang.com/update.php";//远程测试服务器上的update.php的地址
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $updateUrl);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_exec($ch);
curl_close($ch);
