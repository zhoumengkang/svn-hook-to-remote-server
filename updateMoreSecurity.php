<?php
header("Cache-Control:no-cache,must-revalidate");
//首先判断ip是否合法
if(!preg_match('/123\.123\.123\.[0-9]+/', $_SERVER['REMOTE_ADDR']){
  //可以给管理员发送邮件
  die('ip不合法');
}
?>
<form action="" method="post">
  <input type="password" name="password" id="password" value="">
  <input type="submit" value="提交" onclick="storePassword();">
  <script type="text/javascript">
    //自动填充密码
    function setValue(){
      var passwordInput = document.getElementById('password');
      passwordInput.value = getcookie('svnupdate');
    }
    window.onload=setValue;
 
    //存储密码
    function storePassword(){
      var passwordInputValue = document.getElementById('password').value;
      if(getcookie('svnupdate') != passwordInputValue){
        setcookie('svnupdate',passwordInputValue,365);
      }
    }
 
    //Cookie操作函数
    function setcookie(name,value,days){
        if("undefined" == typeof(days)){
            days = 30;
        }else{
            days = parseInt(days);
        }
        var exp  = new Date();
        exp.setTime(exp.getTime() + days*24*60*60*1000);
        document.cookie = name + "="+ value + ";expires=" + exp.toGMTString();
    }
    function getcookie(name){
        var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
        if(arr != null){
            return (arr[2]);
        }else{
            return "";
        }
    }
  </script>
</form>
<?php
if($_POST['password'] !='123456'){
  die('密码错误');
}
putenv("LC_CTYPE=zh_CN.UTF-8");
$handle = popen('svn up /test --username zmk --password 123456 2>&1', 'r');
$read = stream_get_contents($handle);
echo "<pre>";
printf($read);
echo "</pre>"; 
pclose($handle);
