svn-hook-to-remote-server
=========================
##你是否也有这样的场景
  A服务器是Web测试服务器
  
  B服务器为SVN服务器
  
  我们需要频繁地将代码提交到B服务器上，然后在A服务器上从SVN里检出最新的代码，再做测试。
  
  *有时候不是所有人都有A服务器的登录权限的，又或者登录A服务器非常麻烦，比如要先连VPN，然后SSH连接。那样自动触发更新就非常有必要了。*
  
  **如果你开发的时候有这个使用情景，那么这几段简短的代码对你非常有用啦！它会在我们往SVN服务器提交代码的时候，自动更新到A服务器上，不管你是在内网还是外网。**
  
##使用说明
>1. `post-commit` 存放在B服务器（SVN服务器）是SVN的钩子文件，存放在 `svn项目路径/hooks/post-commit`

>2. `svn.php` 存放在B服务器（SVN服务器）上，供 `post-commit` 来执行，通过 `curl` 来触发模拟http协议访问A服务器上的 `update.php`

>3. `update.php` 存放在A服务器（Web测试服务器）上，保证该脚本可以通过Web方式访问

>4. `updateMoreSecurity.php` 存放在C服务器（Web线上服务器）上，手动更新脚本，保证该脚本可以通过Web方式访问

##注意事项
使用过程可以会有很多的脚本执行权限问题，请往nginx和apache的属主和属组上修改
```shell
chown -R www:www xxx
```
还有需要注意的就是svn1.6版本之后在远程执行 `svn up` 的时候会提示时候保存密码，需要对远程服务器上的svn配置做下修改,可以参考我之前的帖子: http://mengkang.net/67.html
