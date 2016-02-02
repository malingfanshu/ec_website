<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo ($title); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="XX,XX商城">
        <meta name="description" content="XX商城首页">
        <link rel="shortcut icon" href="/ec_website/favicon.ico"/>
        
        
        <link rel="stylesheet" href="/ec_website/Public/Css/common.css"/>
        <link rel="stylesheet" href="/ec_website/Public/Shop/css/member.css"/>
        <script src="/ec_website/Public/js/jquery-1.8.3.min.js"></script>
        
        <!--弹窗插件-->
        <link rel="stylesheet" href="/ec_website/Public/Plugin/layer/skin/layer.css"/>
        <script src="/ec_website/Public/Plugin/layer/layer.js"></script>
        <!--前端验证插件-->
        <link rel="stylesheet" href="/ec_website/Public/Plugin/jquery-validation-engine/css/validationEngine.jquery.css"/>
        <script src="/ec_website/Public/Plugin/jquery-validation-engine/js/jquery.validationEngine-zh_CN.js"></script>
        <script src="/ec_website/Public/Plugin/jquery-validation-engine/js/jquery.validationEngine.min.js"></script>
        <!--日历插件-->
        <link rel="stylesheet" href="/ec_website/Public/Plugin/jquery.cxcalendar-1.5/css/jquery.cxcalendar.css"/>
        <script src="/ec_website/Public/Plugin/jquery.cxcalendar-1.5/js/jquery.cxcalendar.min.js"></script>
        
        <script src="/ec_website/Public/Js/base64.js"></script>
        <script src="/ec_website/Public/Js/common.js"></script>
    </head>
    <body>
        <div class="main">
    <form id="register_phone_step1_form" method="post">
        手机号：<input id="register_phone_step1_phone" type="text" name="phone" class="validate[required]" /><br />
        验证码：<input id="register_phone_step1_code" type="text" name="code" class="validate[required]" /><br />
    </form>
    <p>先输入手机号</p>
    <button id="get_register_phone_code" disabled>获取验证码</button><br />
    <button id="register_phone_step1_next">下一步</button>
</div>
<!--隐藏值-->
<input type="hidden" id="hidden_value" value={check_phone_url:"<?php echo U('Shop/Login/ajaxCheckPhoneExist');?>",code_url:"<?php echo U('Shop/Login/ajaxGetSendSmsCode');?>",verify_url:"<?php echo U('Shop/Login/ajaxJudgeSmsCode');?>"} />
<script src="/ec_website/Public/Shop/js/member.js"></script>
    </body>
</html>