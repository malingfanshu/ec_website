<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo ($title); ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="keywords" content="XX,XX商城">
        <meta name="description" content="XX商城首页">
        <link rel="shortcut icon" href="/favicon.ico"/>
        
        
        <link rel="stylesheet" href="/Public/Shop/css/common.css"/>
        <script src="/Public/js/jquery-1.11.3.min.js"></script>
        
        <!--弹窗插件-->
        <link rel="stylesheet" href="/Public/Plugin/layer/skin/layer.css"/>
        <script src="/Public/Plugin/layer/layer.js"></script>
        <!--前端验证插件-->
        <link rel="stylesheet" href="/Public/Plugin/jquery-validation-engine/css/validationEngine.jquery.css"/>
        <script src="/Public/Plugin/jquery-validation-engine/js/jquery.validationEngine-zh_CN.js"></script>
        <script src="/Public/Plugin/jquery-validation-engine/js/jquery.validationEngine.min.js"></script>
        
        <script src="/Public/Js/common.js"></script>
    </head>
    <body>
        <div class="body">
            <div class="login-body">
    <div class="center-block top">
        <div class="logo"><a href="javascript:void(0);"><img src="/Public/Image/logo2.png"/></a></div>
    </div>
    <div class="main">
        <div class="center-block">
            <div class="left">
                <a><img src="/Public/Image/bg_login.png" /></a>
            </div>
            <div class="right">
                <div class="login-frame">
                    
                    <div class="title">
                        <span class="shop-name">某某商城</span>
                        <a href="javascript:void(0);"><span class="register"><img src="/Public/Image/icon/iconfont-next.png" />立即注册</span></a>
                    </div>
                    <div class="prompt">
                        <span>输入密码时请注意安全！</span>
                    </div>
                    <form id="login-form" method="post">
                        <div class="input">
                            <img class="prev-icon" src="/Public/Image/icon/iconfont-weibiaoti2.png" />
                            <input class="user" name="user" type="text" placeholder="用户名/邮箱/手机号（不小于6位）" />
                        </div>
                        <div class="input">
                            <img class="prev-icon" src="/Public/Image/icon/iconfont-mima.png" />
                            <input class="pwd" type="password" name="pwd" placeholder="密码（不小于6位）" />
                        </div>
                    
                    
                        <div class="verify">
                            <img class="prev-icon" src="/Public/Image/icon/iconfont-yanzhengma.png"/>
                            <input class="verify-value" name='verify' type="text" placeholder="验证码" />
                            <img class="verify-code" src="<?php echo U('Shop/Common/getVerify');?>"/>
                        </div>
                    </form>
                    <div class="forget-password">
                        <a href="javascript:void(0);"><span>忘记密码？</span></a>
                    </div>
                    <div class="login-btn">
                        <span>登&nbsp;&nbsp;&nbsp;录</span>
                    </div>
                </div>
            </div>
            <div style="clear:both;"></div>
        </div>
    </div>
    <div class="center-block bottom">
        
    </div>
</div>
<!--隐藏值-->
<input type="hidden" id="hidden_value" value={check_url:"<?php echo U('Shop/Login/ajaxLoginCheck');?>",verify_url:"<?php echo U('Shop/Common/getVerify');?>"} />
<script>
    var hidden_value = get_hidden_value(); // 获取页面的隐藏值
    /*单击刷出新的验证码*/
    $(".login-body .verify-code").on("click",function(e){ 
        $(".login-body .verify-code").prop("src",hidden_value.verify_url);
    });
    
    $(".login-body .login-btn").on("click",function(e){
        if($(".login-body .verify input").val() == null || $(".login-body .verify input").val() == ''){
            layer.msg("请输入验证码");
        }else{
            if($(".login-body input.user").val() == null || $(".login-body input.user").val() == "" || $(".login-body input.user").val().length < 6){
                layer.msg("用户名格式不正确");
            }else{
                if($(".login-body input.pwd").val() == null || $(".login-body input.pwd").val() == "" || $(".login-body input.pwd").val().length < 6){
                    layer.msg("密码格式不正确");
                }else{
                    $.ajax({
                        url:hidden_value.check_url,
                        type:"post",
                        data:$("#login-form").serialize(),
                        dataType:"json",
                        success:function(result){
                            console.log(result);
                            if(result.status == 'false'){
                                layer.msg(result.info);
                                $(".login-body .verify-code").prop("src",hidden_value.verify_url); // 重新载入验证码
                            }else{
//                                var index = layer.load(1);
                            }
                        }
                    });
                }
            }
        }
        
    });
</script>  
        </div>
    </body>
</html>