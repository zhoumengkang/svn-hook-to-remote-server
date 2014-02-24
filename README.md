svn-hook-to-remote-server
=========================
##使用说明
>1. `update.php` 存放在远程服务器上

>2. `post-commit` 是svn的钩子文件

>3. `svn.php` 存放在svn服务器上供 `post-commit` 来执行，而触发模拟访问 `update.php`

##注意事项
使用过程可以会有很多的脚本执行权限问题，请往nginx和apache的属主和属组上修改
```shell
chown -R www:www xxx
```
还有需要注意的就是svn1.6版本之后在远程执行 `svn up` 的时候会提示时候保存密码，需要对远程服务器上的svn配置做下修改,可以参考我之前的帖子:
http://stackoverflow.com/questions/21870660
