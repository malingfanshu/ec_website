<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>跳转提示</title>
</head>
<body>
    <h1>错误</h1>
    <p><?php echo $message; ?></p>
    <script>
        setTimeout("window.location.href='<?php echo $jumpUrl; ?>'",<?php echo $waitSecond; ?>*1000);
    </script>
</body>
</html>