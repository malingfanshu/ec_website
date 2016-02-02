<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo ($title); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="XX,XX商城">
        <meta name="description" content="XX商城首页">
        <link rel="shortcut icon" href="/ec_website/favicon.ico"/>
        <link rel="stylesheet" href="/ec_website/Public/plugin/layer/skin/layer.css"/>
        <link rel="stylesheet" href="/ec_website/Public/plugin/jquery-validation-engine/css/validationEngine.jquery.css"/>
        <link rel="stylesheet" href="/ec_website/Public/css/common.css"/>
        <script src="/ec_website/Public/js/jquery-1.8.3.min.js"></script>
        <script src="/ec_website/Public/plugin/layer/layer.js"></script>
        <script src="/ec_website/Public/plugin/jquery-validation-engine/js/jquery.validationEngine-zh_CN.js"></script>
        <script src="/ec_website/Public/plugin/jquery-validation-engine/js/jquery.validationEngine.min.js"></script>
        <script src="/ec_website/Public/js/base64.js"></script>
        <script src="/ec_website/Public/js/common.js"></script>
    </head>
    <body>
        <link rel="stylesheet" href="/ec_website/Public/Shop/css/member.css"/>
<div class="main">
    <form id="login_form" method="post">
        用户名：<input type="text" name="user" class="validate[required]" /><br />
        密码：<input type="password" name="pwd" class="validate[required]" /><br />
        验证码：<input type="text" name='verify' class="validate[required]"><br />
    </form>
    <button id="check_btn">登录验证</button>
    <image id="verify" src="<?php echo U('Shop/Common/getVerify');?>" />
</div>
<!--隐藏值-->
<input type="hidden" id="hidden_value" value={check_url:"<?php echo U('Shop/Login/ajaxLoginCheck');?>",verify_url:"<?php echo U('Shop/Common/getVerify');?>"} />
<script src="/ec_website/Public/Shop/js/member.js"></script>
    </body>
</html>