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
    <form id="register_email_step1_form" method="post" action="<?php echo U('/Shop/Login/registerEmailCheck');?>">
        邮箱：<input id="register_email_step1_email" type="text" name="email" class="validate[required]" /><br />
        用户昵称：<input type="text" name="nickname" class="validate[required]" /><br />
        登录密码：<input type="password" name="password" class="validate[required]" /><br />
        密码确认：<input type="password" name="repassword" class="validate[required]" /><br />
        支付密码：<input type="password" name="pay_password" class="validate[required]" /><br />
        支付密码确认：<input type="password" name="pay_repassword" class="validate[required]" /><br />
        生日：<input id="register_email_step2_calendar" name="birthday" type="text"><br />
        <input type="submit" name="submit" value="注册" />
    </form>
</div>
<!--隐藏值-->
<input type="hidden" id="hidden_value" value />
<script src="/ec_website/Public/Shop/js/member.js"></script>

    </body>
</html>